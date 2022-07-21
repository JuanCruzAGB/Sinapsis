export default function cancelButton(){

const fields = document.querySelector("form").getElementsByTagName('*');
const editBtn = document.querySelector(".btn-edit-form");
const cancelBtn = document.querySelector(".btn-cancel-form");


cancelBtn.addEventListener("click", function(){
    for(var i = 0; i < fields.length; i++){
        document.querySelector("form").reset();
        fields[i].setAttribute('disabled', '');
    }

    editBtn.style.display = "block";
    })

}
