

$(document).ready(function(){
    $('#Entry_no').on('input', function(){
        let entryNo = $(this).val();
        if (entryNo.length <= 12 ) {
            $.ajax({
                url: 'Entry.php',
                method: 'POST',
                data: {Entry_no: entryNo},
                success: function(response) {
                    if(response === 200||OK) {
                        $('#message').text('Entry No not found. Please fill in manually.');
                        $('input[type="text"]').not('#Entry_no').val('');
                    } else {
                        let data = JSON.parse(response);
                        $('#message').text('');
                        $('#Birth_in_the').val(data.Birth_in_the);
                        $('#District_in_the').val(data.District_in_the);
                        // add other fields as needed
                        $('#Entry_no').val(data.Entry_no);
                        $('#where_born').val(data.where_born);
                        $('#Name').val(data.Name);
                        $('#Date_of_birth').val(data.Date_of_birth);
                        $('#sex').val(data.sex);
                        $('#Name_and_Surname_of_Father').val(data.Name_and_Surname_of_Father);
                        $('#Name_and_Maiden_Name_of_Mother').val(data.Name_and_Maiden_Name_of_Mother);
                        $('#Name_and_Description_of_Informant').val(data.Name_and_Description_of_Informant);
                        $('#Name_of_Registering_Officer').val(data.Name_of_Registering_Officer);
                        $('#Date_of_Registration').val(data.Date_of_Registration);
                        $('#District_Assistance').val(data.District_Assistance);
                        $('#Registrar').val(data.Registrar);
                        $('#Date').val(data.Date);
                     
                    }
                }
            });
        }
    });
});

//draggable
function previewForm() {
    const Birth_in_the = document.getElementById('Birth_in_the').value;
    const District_in_the = document.getElementById('District_in_the').value;
    const Entry_no = document.getElementById('Entry_no').value;
    const where_born = document.getElementById('where_born').value;
    const Name = document.getElementById('Name').value;
    const Date_of_birth = document.getElementById('Date_of_birth').value;
    const sex = document.getElementById('sex').value;
    const Name_and_Surname_of_Father = document.getElementById('Name_and_Surname_of_FatherName_and_Surname_of_Father').value;
    const Name_and_Maiden_Name_of_Mother = document.getElementById('Name_and_Maiden_Name_of_Mother').value;
    const Name_and_Description_of_Informant = document.getElementById('Name_and_Description_of_Informant').value;
    const Name_of_Registering_Officer = document.getElementById('Name_of_Registering_Officer').value;
    const Date_of_Registration = document.getElementById('Date_of_Registration').value;
    const District_Assistance = document.getElementById('District_Assistance').value;
    const Registrar = document.getElementById('Registrar').value;
    const Date = document.getElementById('Date').value;
    


    document.getElementById('previewBirth_in_the').innerText = Birth_in_the;
    document.getElementById('previewDistrict_in_the').innerText = District_in_the;
    document.getElementById('previewEntry_no').innerText = Entry_no;
    document.getElementById('previewwhere_born').innerText = where_born;
    document.getElementById('previewName').innerText = Name;
    document.getElementById('previewDate_of_birth').innerText = Date_of_birth;
    document.getElementById('previewsex').innerText = sex;
    document.getElementById('previewName_and_Surname_of_FatherName_and_Surname_of_Father').innerText = Name_and_Surname_of_FatherName_and_Surname_of_Father;
    document.getElementById('previewName_and_Maiden_Name_of_Mother').innerText = Name_and_Maiden_Name_of_Mother;
    document.getElementById('previewName_and_Description_of_Informant').innerText = Name_and_Description_of_Informant;
    document.getElementById('previewName_of_Registering_Officer').innerText = Name_of_Registering_Officer;
    document.getElementById('previewDate_of_Registration').innerText = Date_of_Registration;
    document.getElementById('previewDistrict_Assistance').innerText = District_Assistance;
    document.getElementById('previewRegistrar').innerText = Registrar;
    document.getElementById('previewDate').innerText = Date;

    document.getElementById('previewContainer').style.display = 'block';

    // Make each preview element draggable
    dragElement(document.getElementById('previewDistrict_in_the'));
    dragElement(document.getElementById('previewBirth_in_the'));
    dragElement(document.getElementById('previewEntry_no'));
    dragElement(document.getElementById('previewwhere_born'));
    dragElement(document.getElementById('previewName'));
    dragElement(document.getElementById('previewDate_of_birth'));
    dragElement(document.getElementById('previewsex'));
    dragElement(document.getElementById('previewName_and_Surname_of_FatherName_and_Surname_of_Father'));
    dragElement(document.getElementById('previewName_and_Maiden_Name_of_Mother'));
    dragElement(document.getElementById('previewName_and_Description_of_Informant'));
    dragElement(document.getElementById('previewName_of_Registering_Officer'));
    dragElement(document.getElementById('previewDate_of_Registration'));
    dragElement(document.getElementById('previewDistrict_Assistance'));
    dragElement(document.getElementById('previewRegistrar'));
    dragElement(document.getElementById('previewDate'));
}

function printPreview() {
    const printContent = document.getElementById('previewContent').innerHTML;
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
    location.reload();  // Reload the page to reset the script
}

function dragElement(element) {
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

    element.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        element.style.top = (element.offsetTop - pos2) + "px";
        element.style.left = (element.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.onmousemove = null;
    }
}

//popup    
const hamburer = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");

if (hamburer) {
hamburer.addEventListener("click", () => {
navList.classList.toggle("open");
});
}

// Popup
const popup = document.querySelector(".popup");
const closePopup = document.querySelector(".popup-close");

if (popup) {
closePopup.addEventListener("click", () => {
popup.classList.add("hide-popup");
});

window.addEventListener("load", () => {
setTimeout(() => {
  popup.classList.remove("hide-popup");
}, 1000);
});
}