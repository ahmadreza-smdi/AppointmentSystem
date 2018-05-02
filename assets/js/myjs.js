function signin(){
  var pass=document.getElementById('login_password').value;
  if(pass.length<6){
    alert("password must be more than 6 character");
  }
  else{
    if(pass.length>=6){
      document.getElementById('login-form').submit();
    }
  }
}
function signup(){
  var pass=document.getElementById("register_password").value;
  var conf=document.getElementById("register_confirm").value;
  if(pass.length<6 || conf.length<6){
      alert("password must be more than 6 character");
  }
  else{
    if(pass != conf){
      alert("your passwords are not match");
    }
    else{
        document.getElementById("register-form").submit();
    }
  }
}
counter1=0;
counter2=0;
function add_file(c){
  if(c==0){
    counter1++;
   }
   else{if(c==1){
     counter2++;
   }}
  var file_input=document.createElement("input");
	var input_att=document.createAttribute("type");
	input_att.value="file";
	file_input.setAttributeNode(input_att);
	input_att=document.createAttribute("name");
  if(c==0){
	   input_att.value="image"+counter1;
   }
   else{if(c==1){
     input_att.value="video"+counter2;
   }}
	file_input.setAttributeNode(input_att);
	input_att=document.createAttribute("id");
  if(c==0){
	   input_att.value="image"+counter1;
   }
   else{if(c==1){
     input_att.value="video"+counter2;
   }}
	file_input.setAttributeNode(input_att);
	var delete_btn=document.createElement("button");
	var btn_att=document.createAttribute("type");
	btn_att.value="button";
	delete_btn.setAttributeNode(btn_att);
	btn_att=document.createAttribute("class");
	btn_att.value="btn btn-danger";
	delete_btn.setAttributeNode(btn_att);
	btn_att=document.createAttribute("id");
  if(c==0){
     	btn_att.value="delete"+counter1;
   }
   else{if(c==1){
	    btn_att.value="delete"+counter2;
   }}
	delete_btn.setAttributeNode(btn_att);
	btn_att=document.createAttribute("onclick");
  if(c==0){
	   btn_att.value="delete_file("+counter1+","+c+")";
   }
   else{if(c==1){
	    btn_att.value="delete_file("+counter2+","+c+")";
   }}
	delete_btn.setAttributeNode(btn_att);
	var minus_span=document.createElement("span");
	var span_att=document.createAttribute("class");
	span_att.value="glyphicon glyphicon-minus";
	minus_span.setAttributeNode(span_att);
	span_att=document.createAttribute("aria-hidden");
	span_att.value="true";
	minus_span.setAttributeNode(span_att);
	delete_btn.appendChild(minus_span);
  if(c==0){
     var files=document.getElementById("images_div");
   }
   else{if(c==1){
     var files=document.getElementById("videos_div");
   }}
   if(c==0){
      var plus=document.getElementById("image_plus");
    }
    else{if(c==1){
      var plus=document.getElementById("video_plus");
    }}
  files.appendChild(file_input);
  files.appendChild(delete_btn);
  files.insertBefore(file_input,plus);
  files.insertBefore(delete_btn,plus);
}
function delete_file(x,z){
  if(z==0){
      var file_input="image"+x;
  }
  else{
    if(z==1){
      var file_input="video"+x;

    }
  }
	var delete_btn="delete"+x;
	$("#"+file_input).remove();
	$("#"+delete_btn).remove();
}
function add_goods(){
  document.getElementById('images_num').setAttribute("value",counter1);
  document.getElementById('videos_num').setAttribute("value",counter2);
  document.getElementById('goods_form').submit();
  }
  function remove_file(x){
    $("#"+x).remove();
  }
  function reply_comment(id,user){
    document.getElementById('comment_area').value='@'+user;
    document.getElementById('replyto').value=id;
    location.hash="comment_area";
  }
  function header_alert(id,x,c){
    name="header";
    explain="all description and branches of this header will be deleted";
    if(x==2){
      name="branch";
      explain="all description of this branch will be deleted";
    }
    if(confirm(explain)){
      document.getElementById("a"+c).setAttribute("href","logic.php?job=delete_"+name+"&id="+id);
    }
  }
