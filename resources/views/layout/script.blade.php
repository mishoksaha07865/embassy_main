<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>

<script>
    function toggleInputBox() {
    const radioSelection = document.querySelector('input[name="emb_list"]:checked').value;
    const inputNew = document.getElementById('candidate');
    const inputCancel = document.getElementById('cancelInput');

    if (radioSelection === 'New') {
        inputNew.style.display = 'block';
        inputCancel.style.display = 'none';
        console.log("new selected")
        // document.getElementById('candidate').setAttribute('onchange', 'getdata()');
    } else  (radioSelection === 'Cancel') {
        inputNew.style.display = 'none';
        inputCancel.style.display = 'block';
        console.log("cancel selected")
        // document.getElementById('candidate').setAttribute('onchange', 'getCanceldata()');
    } 
}
</script>
<script>

// $(document).ready(function() {
//     var apiUrl = window.location.origin + '/user/get';
//     var method = "GET";
//     var data = {
       
//     };
//     var headers = {
       
//     };
    
//     callApi(apiUrl, method, data, headers);
   
// });
// var dataObject = {};
// function callApi(apiUrl, method, data, headers) {
//             $.ajax({
//                 url: apiUrl,
//                 type: method,
//                 data: data,
//                 headers: headers,
//                 dataType: "json",
               
//                 success: function (response) {
//                         console.log(response);
                        
//                         for (var key in response.candidates) {
//                             var candidateValue = response.candidates[key];
//                             var userEmail = key;
//                             var combinedValue = {
//                                 candidate: candidateValue,
//                                 user: response.users[candidateValue] || null 
//                             };
//                             dataObject[userEmail] = combinedValue;
//                         }
//                         console.log(dataObject);
//                     },   
//                     error: function (error) {
//                     console.error("Error calling API:", error);
//                 }
//             });
// }



</script>
<script>
    function showAlert() {
        alert("Visa is not available! Please Enter Your Candidates Visa First for Print");
        // You can perform other actions here as needed.
    }
    function surity(id) {
        let text = "Sure Want to delete!\nEither OK or Cancel.";
        if (confirm(text)) {
            let url = 'delete/' + id;
            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(response => {
                    if (response.success) {
                        alert(response.message, "Deleted Successfully");
                        location.reload();

                    } else {
                        alert(response.message, "Not Deleted");
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error("An error occurred:", error);
                    // Handle any network or other errors here.
                });
        } else {
            console.log("You canceled!");
        }

        return false; // Prevent the link from being followed immediately

    }

    function SearchPC() {
        var PCInput = document.getElementById("police_licence").value.toUpperCase();
        var url = `https://pcc.police.gov.bd/ords/f?p=500:50::::RP:P50_TOKEN_ID:${PCInput}`;

        // Open the link in a new tab
        window.open(url, "_blank");
    }
</script>
<script>
    // 
    $(document).ready(function() {
        $('#candidatetable').DataTable();


        var apiUrl = window.location.origin + '/user/get';
        var method = "GET";
        var data = {

        };
        var headers = {

        };

        callApi(apiUrl, method, data, headers);

    });
    var dataObject = {};

    function callApi(apiUrl, method, data, headers) {
        $.ajax({
            url: apiUrl,
            type: method,
            data: data,
            headers: headers,
            dataType: "json",

            success: function(response) {
                console.log(response);

                for (var key in response.candidates) {
                    var candidateValue = response.candidates[key];
                    var userEmail = key;
                    var combinedValue = {
                        candidate: candidateValue,
                        user: response.users[candidateValue] || null
                    };
                    dataObject[userEmail] = combinedValue;
                }
                console.log(dataObject);
            },
            error: function(error) {
                console.error("Error calling API:", error);
            }
        });
    }
    </script>

<script>
// 
$(document).ready(function() {
    $('#candidatetable').DataTable();


    var apiUrl = window.location.origin + '/user/get';
    var method = "GET";
    var data = {

    };
    var headers = {

    };

    callApi(apiUrl, method, data, headers);

});
var dataObject = {};

function callApi(apiUrl, method, data, headers) {
    $.ajax({
        url: apiUrl,
        type: method,
        data: data,
        headers: headers,
        dataType: "json",

        success: function(response) {
            console.log(response);

            for (var key in response.candidates) {
                var candidateValue = response.candidates[key];
                var userEmail = key;
                var combinedValue = {
                    candidate: candidateValue,
                    user: response.users[candidateValue] || null
                };
                dataObject[userEmail] = combinedValue;
            }
            console.log(dataObject);
        },
        error: function(error) {
            console.error("Error calling API:", error);
        }
    });
}
$('#pnumber').on('change', function() {
    var inputValue = $(this).val();
    var foundObject = dataObject[inputValue];

    if (foundObject) {
        // var email = Object.keys(foundObject)[0];
        var email = foundObject.candidate;
        // var licenceName = foundObject[email].user ? foundObject[email].user.licence_name : "Not available";
        var licenceName = foundObject.user.licence_name ? foundObject.user.licence_name : "Not available";
        alert(inputValue + " exists in database under: " + licenceName + '(' + foundObject.user.rl_no +
            ')' + ' Contact here: ' + email);

        $('#pnumber').val("");
    } else {

    }
});
$('#medical_issue_date').datepicker({
    dateFormat: 'dd/mm/yy',
    onSelect: function(selectedDate) {
        var issueDate = $(this).datepicker('getDate');
        issueDate.setMonth(issueDate.getMonth() + 2);
        issueDate.setDate(issueDate.getDate() - 1);
        var formattedDate = $.datepicker.formatDate('dd/mm/yy', issueDate);
        $('#medical_expire_date').val(formattedDate);
    }
});
$('#pass_issue_date').datepicker({
    dateFormat: 'dd/mm/yy',
    onSelect: function(selectedDate) {
        var issueDate = $(this).datepicker('getDate');
        var radioSelection = document.querySelector('input[name="passDate"]:checked').value;
        console.log(radioSelection);
        if (radioSelection === "ten") {
            issueDate.setFullYear(issueDate.getFullYear() + 10);
        } else if (radioSelection === "five") {
            issueDate.setFullYear(issueDate.getFullYear() + 5);
        } else {
            issueDate.setFullYear(issueDate.getFullYear() + 5);
        }
        issueDate.setDate(issueDate.getDate() - 1);
        var formattedDate = $.datepicker.formatDate('dd/mm/yy', issueDate);
        $('#pass_expire_date').val(formattedDate);
    }
});

$('#date_of_birth').datepicker({
    dateFormat: 'dd/mm/yy',
    onSelect: function(selectedDate) {
        var selectedDateObject = $(this).datepicker('getDate');
        var currentDate = new Date();

        // Calculate the age difference in years
        var ageDifferenceYears = currentDate.getFullYear() - selectedDateObject.getFullYear();

        var ageDifference = currentDate - selectedDateObject;
        var ageDate = new Date(ageDifference);
        var years = ageDate.getUTCFullYear() - 1970;
        var months = ageDate.getUTCMonth();
        var days = ageDate.getUTCDate() - 1;


        // Check if the birthdate has occurred 21 or more years ago
        if (ageDifferenceYears > 21 || (ageDifferenceYears === 21 && (currentDate.getMonth() >
                selectedDateObject.getMonth() || (currentDate.getMonth() === selectedDateObject
                    .getMonth() && currentDate.getDate() >= selectedDateObject.getDate())))) {
            var formattedDate = $.datepicker.formatDate('dd/mm/yy', selectedDateObject);
            $('#date_of_birth').val(formattedDate);
        } else {
            // Display an error message or take some other action
            var ageString = years + " years, " + months + " months, " + days + " days";
            alert("You must be at least 21 years old. Your Age is " + ageString);
            $(this).val(''); // Clear the input field
        }
    }
});
$('#mofa_date').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function(selectedDate) {
        var dateOfBirth = $(this).datepicker('getDate');

        var formattedDate = $.datepicker.formatDate('yy-mm-dd', dateOfBirth);
        $('#mofa_date').val(formattedDate);
    }
});

$('#visainput').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission
    var form = $(this);
    var formData = form.serialize(); // Serialize the form data
    // console.log(formData);
    var id = (document.getElementById('candidate_id').value);
    // console.log(id);
    $.ajax({
        url: "{{ url('user/visaadd') }}/" + id,

        method: form.attr('method'),
        data: formData,
        success: function(response) {

            console.log(response);

            Swal.fire({
                title: response.title,
                text: response.message,
                icon: response.icon,

            });
            // if (response.redirect_url) {
            //     setTimeout(function() {
            //       var redirectUrl = window.location.origin + '/'+ response.redirect_url;
            //       window.location.href = redirectUrl;
            //     }, 2000);
            // }l

        },
        error: function(response) {

            console.log(response.title);
            Swal.fire({
                title: "Error",
                text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                icon: 'error',

            });
            //   if (response.redirect_url) {
            //     setTimeout(function() {
            //       var redirectUrl = window.location.origin + '/'+ response.redirect_url;
            //       window.location.href = redirectUrl;
            //     }, 2000);
            // }l


        }

    });
});

$('#addcandidate').on('submit', function(e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();
    console.log(formData);
    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: form.serialize(),
        success: function(response) {

            console.log(response);

            Swal.fire({
                title: response.title,
                text: response.message,
                icon: response.icon,

            });
            if (response.redirect_url) {
                setTimeout(function() {
                    var redirectUrl = window.location.origin + '/' + response
                        .redirect_url;
                    window.location.href = redirectUrl;
                }, 3000);
            }

        },
        error: function(response) {

            console.log(response);
            var errorMessage = xhr.responseText;
            var regex = /SQLSTATE\[23000\]:.*Duplicate entry.*'(.+)' for key '(.+)'/;
            var matches = errorMessage.match(regex);
            var duplicateEntryValue = matches ? matches[1] : null;
            var duplicateEntryKey = matches ? matches[2] : null;

            console.log("Duplicate Entry Value:", duplicateEntryValue);
            console.log("Duplicate Entry Key:", duplicateEntryKey);
            Swal.fire({
                title: "Error",
                text: "Cannot add candidate\n 1: Complete all fields are required\n 2: Same ID check",
                icon: 'error',

            });
            if (response.redirect_url) {
                setTimeout(function() {
                    var redirectUrl = window.location.origin + '/' + response
                        .redirect_url;
                    window.location.href = redirectUrl;
                }, 3000);
            }

        }
    });
});
// document.getElementById('pass_issue_date').addEventListener('change', function() {
//   var issueDate = new Date(this.value);
//   var expireDate = new Date(issueDate.getFullYear() + 10, issueDate.getMonth(), issueDate.getDate());
//   var formattedExpireDate = formatDate(expireDate);
//   console.log(formattedExpireDate);
//   document.getElementById('pass_expire_date').value = formattedExpireDate;
// });

function formatDate(date) {
    date.setDate(date.getDate() - 1); // Subtract 1 day from the date

    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2);
    var day = ('0' + date.getDate()).slice(-2);

    return year + '-' + month + '-' + day;
}
</script>