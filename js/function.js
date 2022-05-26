
function DropDown(info){
    var years = [FirstYear,SecondYear,ThirdYear,FourthYear,FifthYear];
    for (var i=0 ; i < years.length ; i++){
      if (info == years[i]){
        if (years[i].style.display == "inline") 
          years[i].style.display = "none";
        else 
          years[i].style.display = "inline";
      }
      else {
        years[i].style.display = "none";
      }
    }
}

function DropDown_Font(info){
  var fonts = [Font_1,Font_2,Font_3];
  for (var i=0 ; i < fonts.length ; i++){
    if (info === fonts[i]){
      if (fonts[i].style.display === "inline") 
        fonts[i].style.display = "none";
      else 
        fonts[i].style.display = "inline";
    }
    else {
      fonts[i].style.display = "none";
    }
  }
}

function DropDown_design(info){
  var designs = [New_design,Old_design];
  for (var i=0 ; i < designs.length ; i++){
    if (info === designs[i]){
      if (designs[i].style.display === "inline") 
        designs[i].style.display = "none";
      else 
        designs[i].style.display = "inline";
    }
    else {
      designs[i].style.display = "none";
    }
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

/*
function DropDown(ty,info){
  const years = [FirstYear,SecondYear,ThirdYear,FourthYear,FifthYear];
  const fonts = [Font_1,Font_2,Font_3,Font_4];
  const designs = [New_design,Old_design];
  var moreText;
  if (ty == "year"){
    moreText = years.slice();
  }
  else if (ty == "font"){
    moreText = fonts.slice();
  }
  else if (ty == "design"){
    moreText = designs.slice();
  }
  for (var i=0 ; i < moreText.length ; i++){
    if (info == years[i]){
      if (moreText[i].style.display == "inline") 
        moreText[i].style.display = "none";
      else 
        moreText[i].style.display = "inline";
    }
    else {
      moreText[i].style.display = "none";
    }
  }
}

*/