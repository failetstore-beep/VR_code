<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Widget</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</head>
<body>
<div class="container py-3">
  <ul class="nav nav-tabs" id="modeTabs">
    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-model">On Model</a></li>
    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-me">On Me</a></li>
    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-beside">Beside</a></li>
  </ul>
  <div class="tab-content border p-3">
    <div class="tab-pane fade show active" id="tab-model">
      <canvas id="modelCanvas" class="w-100"></canvas>
      <div class="mt-2">
        <button id="scalePlus" class="btn btn-sm btn-secondary">+</button>
        <button id="scaleMinus" class="btn btn-sm btn-secondary">-</button>
        <input type="range" id="rotate" min="-180" max="180" value="0">
      </div>
    </div>
    <div class="tab-pane fade" id="tab-me">
      <input type="file" id="upload" accept="image/*" class="form-control mb-2">
      <canvas id="meCanvas" class="w-100"></canvas>
    </div>
    <div class="tab-pane fade" id="tab-beside">
      <div class="d-flex justify-content-between align-items-center">
        <img id="productImg" class="img-fluid" style="max-width:45%">
        <img id="refImg" class="img-fluid" style="max-width:45%">
      </div>
      <div id="dimensions" class="mt-2 text-center small"></div>
    </div>
  </div>
</div>
<script>
const slug = "{{ $product->slug }}";
let cfg=null;

$(async function(){
  const lang = new URLSearchParams(location.search).get('lang') || 'en';
  $('html').attr('lang',lang).attr('dir',lang==='ar'?'rtl':'ltr');
  cfg = await $.getJSON('/api/v1/products/'+slug);
  initOnModel();
  initOnMe();
  initBeside();
});

function initOnModel(){
  const canvas=document.getElementById('modelCanvas');
  const ctx=canvas.getContext('2d');
  const base=new Image(); base.src=cfg.model_base.url;
  const prod=new Image(); prod.src=cfg.overlay.url;
  let scale=1, angle=0, x=50, y=50;
  base.onload=function(){ canvas.width=base.width; canvas.height=base.height; draw(); }
  prod.onload=draw;
  function draw(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    if(base.complete) ctx.drawImage(base,0,0);
    ctx.save();
    ctx.translate(x,y);
    ctx.rotate(angle*Math.PI/180);
    ctx.scale(scale,scale);
    if(prod.complete) ctx.drawImage(prod,-prod.width/2,-prod.height/2);
    ctx.restore();
  }
  $('#scalePlus').on('click',()=>{scale+=0.1;draw();});
  $('#scaleMinus').on('click',()=>{scale=Math.max(0.1,scale-0.1);draw();});
  $('#rotate').on('input',e=>{angle=e.target.value;draw();});
  $(canvas).on('mousedown',startDrag);
  function startDrag(e){
    const startX=e.offsetX,startY=e.offsetY,origX=x,origY=y;
    function move(ev){ x=origX+ev.offsetX-startX; y=origY+ev.offsetY-startY; draw(); }
    function up(){ canvas.removeEventListener('mousemove',move); canvas.removeEventListener('mouseup',up); }
    canvas.addEventListener('mousemove',move); canvas.addEventListener('mouseup',up);
  }
}

function initOnMe(){
  const canvas=document.getElementById('meCanvas');
  const ctx=canvas.getContext('2d');
  const prod=new Image(); prod.src=cfg.overlay.url;
  let userImg=null;
  $('#upload').on('change',function(e){
    const file=e.target.files[0];
    const reader=new FileReader();
    reader.onload=function(evt){ userImg=new Image(); userImg.onload=draw; userImg.src=evt.target.result; };
    if(file) reader.readAsDataURL(file);
  });
  function draw(){
    if(!userImg) return;
    canvas.width=userImg.width; canvas.height=userImg.height;
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.drawImage(userImg,0,0);
    ctx.drawImage(prod,50,50);
  }
}

function initBeside(){
  $('#productImg').attr('src',cfg.overlay.url);
  if(cfg.reference && cfg.reference.length){
    const ref=cfg.reference[0];
    $('#refImg').attr('src',ref.url);
    $('#dimensions').text(cfg.overlay.width_mm+'mm vs '+ref.width_mm+'mm');
  }
}

function postEvent(type,data={}){
  return $.ajax({url:'/api/v1/events',method:'POST',contentType:'application/json',data:JSON.stringify({product_id:cfg.id,type,data})});
}
</script>
</body>
</html>
