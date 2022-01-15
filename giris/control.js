function register() {
  let username = $("#k01").val();
  username = username.trim();
  let pass = $("#s01").val();
  pass = sifre.trim();
  let mail = $("#m01").val();
  mail = mail.trim();
  if (username == "" || pass == "" || mail == "") {
    alert("Boş alanları lütfen doldurunuz!");
  } else {
    if (pass.length >= 8 && pass.length >= 8) {
      alert("Şifreniz 8 karakteri geçmek zorundadır!");
    }else{
        $.ajax({
            type: "method",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    }
  }
}
