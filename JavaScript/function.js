function DropDown(info){
    if (info === FirstYear){
      var moreText = document.getElementById("FirstYear");  
    } else if (info === SecondYear){
      var moreText = document.getElementById("SecondYear");  
    } else if (info === ThirdYear){
      var moreText = document.getElementById("ThirdYear");  
    } else if (info === FourthYear){
      var moreText = document.getElementById("FourthYear");  
    } else if (info === FifthYear){
      var moreText = document.getElementById("FifthYear");  
    }
    
    if (moreText.style.display === "inline") {
      moreText.style.display = "none";
    } else {
      moreText.style.display = "inline";
    }
  }
function DropDown_Font(info){
  if (info === Font_1){
    var moreText = document.getElementById("Font_1");  
  } else if (info === Font_2){
    var moreText = document.getElementById("Font_2");  
  } else if (info === Font_3){
    var moreText = document.getElementById("Font_3");  
  } else if (info === Font_4){
    var moreText = document.getElementById("Font_4");  
  }
  
  if (moreText.style.display === "inline") {
    moreText.style.display = "none";
  } else {
    moreText.style.display = "inline";
  }
}

function toggle(source,start) {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const cl = [0,7,14,21,28,35,42,50,59,64,72];
  var st = cl[start-1];
  var en = cl[start]-1;
  var co = 0;
  var ed;
  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i] != source && (checkboxes[i].id<=en && checkboxes[i].id>=st))
          checkboxes[i].checked = source.checked;
  }
}  
count = 0;
document.getElementById('crazyoutput').textContent = "عدد المواد المحددة (" + count + ")";
function checkboxes_inc(){
  count = 0;
  var inputElems = document.getElementsByTagName("input");
  for (var i = 0; i < 85; i++) {
    if (inputElems[i].checked == true && inputElems[i].id < 75)
      count++;
  }
  document.getElementById('crazyoutput').textContent = "عدد المواد المحددة (" + count + ")";
}
