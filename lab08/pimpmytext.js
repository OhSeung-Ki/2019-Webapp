window.onload = function(){
  $("bigger").onclick = fonttimer;
  $("bling").onchange = bling;
  $("snoopify").onclick = snoopify;
}

function biggerpimp(){
  //alert("Hello, wolrd!");
  var original = document.getElementById("sampletext");
  if(!(original.style.fontSize)){
    $("sampletext").style.fontSize = "12pt";
    $("sampletext").style.fontSize = parseInt($("sampletext").style.fontSize)+2+"pt";
  } else {
    $("sampletext").style.fontSize = parseInt($("sampletext").style.fontSize)+2+"pt";
  }
}

function bling(){
  //alert("bling");
  var check = document.getElementById("bling");
  if(check.checked){
    $("sampletext").style.fontWeight = "bold";
    $("sampletext").style.color = "green";
    $("sampletext").style.textDecoration = "underline";
    document.body.style.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
  } else {
    $("sampletext").style.fontWeight = "normal";
    $("sampletext").style.color = "black";
    $("sampletext").style.textDecoration = "none";
    document.body.style.backgroundImage = "none";
  }
}

function snoopify(){
  var text = document.getElementById("sampletext");
  text = text.value.toUpperCase();
  var splited = text.split('.');
  text = splited.join("-izzle.")
  $("sampletext").value = text;
}

function fonttimer() {
  setInterval(function(){biggerpimp();}, 500);
}
