// คลิกเลือกรูปภาพ
function selectImage(e, _class) {
  e.preventDefault();
  document.querySelector(`.${_class}`).click();
}
// เมื่อเลือกรูปภาพแล้ว input file มีการเปลี่ยนแปลง
function imgOnChange(e, _className) {
  readURL(`${_className}`, e.target)
}

function readURL(_name, input) {
  if (input.files && input.files[0]) {
    // var reader = new FileReader();
    // reader.onload = function(e) {
    //   $(_name).attr('src', e.target.result);
    //   $(`${_name}-loading`).remove()
    // }
    // reader.readAsDataURL(input.files[0]);
    uploadimage(_name, input.files[0]);
  }
}

async function uploadimage(_classname, file) {
  try {
    let token_csrf_upload = document.querySelector('#token-csrf-upload').value;
    let formdata = new FormData();
    formdata.append('img', file)
    // formdata.append('token', `${token_csrf_upload}`);

    let response = await fetch(`/api/v1.0/uploadimg`, {
      method: 'POST',
      credentials: "same-origin",
      headers: {
        'token-csrf-upload': `csrf ${token_csrf_upload}`
      },
      body: formdata
    });
    let resJson = await response.json();

    if (resJson.res.status_upload == true) {
      document.querySelector(_classname).setAttribute('src', resJson.res.img_src)
      document.querySelector(_classname).setAttribute('data-image', resJson.res.img)
    } else {

      // new csrf
      if (resJson.message == "Token_CSRF_Upload_Invalid") {
        document.querySelector('.token-csrf-upload-space').innerHTML = atob(resJson.csrf)
      } else {

        let text = "";
        if (resJson.res.message == "error_type") {
          text = "ไม่สามารถอัพโหลดไฟลืนี้ได้ กรุณาเลือกไฟล์ที่เป็นรูปภาพ";
        } else if (resJson.res.message == "error_extension") {
          text = "ไม่สามารถอัพโหลดไฟลืนี้ได้ กรุณาเลือกไฟล์ที่เป็นรูปภาพที่เป็น jpg,jpeg,png,webp";
        } else if (resJson.res.message == "error_fail") {
          text = "ไม่สามารถ อัพโหลดไฟลืนี้ได้ เกิดข้อผิดพลาดบางอย่าง";
        }
        Swal.fire({
          'title': "แจ้งเตือน!",
          text: text,
          icon: "warning",
          confirmButtonText: "OK"
        });
      }
    }

    // new csrf
    if (resJson.csrf) {
      document.querySelector('.token-csrf-upload-space').innerHTML = atob(resJson.csrf)
    }
  } catch {

  }
}