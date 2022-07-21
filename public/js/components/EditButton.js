export default function editButton(){
    const editBtn = document.querySelector(".btn-edit-form");
    const fields = document.querySelectorAll("form .input-edit");
    const cancelBtn = document.querySelector(".btn-cancel-form");

    editBtn.addEventListener("click", function(){
        for(var i = 0; i < fields.length; i++){
            fields[i].removeAttribute("disabled");
        }

        cancelBtn.style.display = "block";
    })

}