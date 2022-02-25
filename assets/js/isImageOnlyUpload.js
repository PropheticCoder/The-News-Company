let emptyFileInput;

function createUpload_1() {
    emptyFileInput = document.createElement("input");
    emptyFileInput.setAttribute("type", "file");
    emptyFileInput.setAttribute("name", "uploadFile_1");
    emptyFileInput.setAttribute("id", "uploadFile_1");
    emptyFileInput.setAttribute("onclick", "fileUpload_1()");
    emptyFileInput.setAttribute("required", "true");
    emptyFileInput.style.marginBottom = "10px";
};

function createUpload_2() {
    emptyFileInput = document.createElement("input");
    emptyFileInput.setAttribute("type", "file");
    emptyFileInput.setAttribute("name", "uploadFile_2");
    emptyFileInput.setAttribute("id", "uploadFile_2");
    emptyFileInput.setAttribute("onclick", "fileUpload_2()");
    emptyFileInput.setAttribute("required", "true");
};

function fileUpload_1() {
    $('#uploadFile_1').click(
        function () {
            var uploadInput = $('#uploadFile_1');
            var uploadInput2;
            var length = uploadInput.get(0).files.length;
            try {
                uploadInput2 = $("#uploadFile_2");
                uploadInput2.remove();
            }
            catch (e) { }
            
            if (length > 0) {
                alert("Images resetted!");
                uploadInput.remove();
                createUpload_1();
                uploadInput = emptyFileInput;
                document.getElementById("upload-container").appendChild(emptyFileInput);
            }
        }
    );

    $('#uploadFile_1').change(
        function () {
            var uploadInput = $('#uploadFile_1');
            var fileType = uploadInput.get(0).files[0].type;
    
            if (fileType != "image/jpeg") {
                alert("File type not allowed!");
                uploadInput.remove();
                createUpload_1();
                uploadInput = emptyFileInput;
                document.getElementById("upload-container").appendChild(emptyFileInput);
            } else {
                emptyFileInput = document.createElement("input");
                createUpload_2();
                document.getElementById("upload-container").appendChild(emptyFileInput);
            }
        }
    );
}


function fileUpload_2() {
    $('#uploadFile_2').change(
        function () {
            var uploadInput = $('#uploadFile_2');
            var fileType = uploadInput.get(0).files[0].type;
            if (fileType != "image/jpeg") {
                alert("File type not allowed!");
                uploadInput.remove();
                createUpload_2();
                document.getElementById("upload-container").appendChild(emptyFileInput);
            }
        }
    );
}

fileUpload_1();