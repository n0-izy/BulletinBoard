function valid() {
  if(document.getElementById('textmessage').value === "" ){
    alert('未入力です');
  }else if ( document.getElementById('textmessage').value !== "" ){
    alert("投稿完了です！");
  }
}

