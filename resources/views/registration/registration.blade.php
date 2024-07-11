<x-layout>
    <div class="container-fluid px-2 py-5 mt-5 py-md-0 mt-md-0 overflow-x-hidden">
        <form class="pt-5 mt-5 py-md-0 mt-md-0" id="formPost">
            <div class="row gap-3 gap-md-0 pt-5 mt-5 py-md-0 mt-md-0">
                <div class="pt-5 mt-5 py-md-0 mt-md-0"></div>
                <h6 class="pt-5 mt-5 py-md-0 mt-md-0"><i>Required fields(<span class="text-danger">*</span>)</i></h6>
                <div class="col-12 col-md-7">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4><span class="text-danger">*</span> Personal Information:</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="fname">
                                    <span class="text-danger">*</span> Firstname:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none fname"
                                    id="fname" minlength="2" required>
                            </div>
                            <div class="mb-2">
                                <label for="mname">
                                    <span class="text-danger">*</span> Middlename:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none mname"
                                    id="mname" minlength="2" required>
                            </div>
                            <div class="mb-2">
                                <label for="lname">
                                    <span class="text-danger">*</span> Lastname:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none lname"
                                    id="lname" minlength="2" required>
                            </div>
                            <div class="mb-2">
                                <label>
                                    <span class="text-danger">*</span> Gender:
                                </label>
                                <div class="d-flex justify-content-start gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="bdate">
                                    <span class="text-danger">*</span> Birthdate:
                                </label>
                                <input type="date"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none bdate"
                                    id="bdate" required>
                            </div>
                            <div class="mb-2">
                                <label for="pnumber">
                                    <span class="text-danger">*</span> Phonenumber:
                                </label>
                                <input type="number"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none pnumber"
                                    id="pnumber" required>
                            </div>
                            <div class="mb-2">
                                <label for="province">
                                    <span class="text-danger">*</span> Province:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none province"
                                    id="province" minlength="4" required>
                            </div>
                            <div class="mb-2">
                                <label for="municipality">
                                    <span class="text-danger">*</span> Municipality:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none municipality"
                                    id="municipality" minlength="4" required>
                            </div>
                            <div class="mb-2">
                                <label for="village">
                                    <span class="text-danger">*</span> Village:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none village"
                                    id="village" minlength="4" required>
                            </div>
                            <div class="mb-2">
                                <label for="street">
                                    <span class="text-danger">*</span> Street:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none street"
                                    id="street" minlength="4" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4><span class="text-danger">*</span> Username & Password:</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="username">
                                    <span class="text-danger">*</span> Username:
                                </label>
                                <input type="text"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none username"
                                    id="username" minlength="6" required>
                            </div>
                            <div class="mb-2">
                                <label for="password">
                                    <span class="text-danger">*</span> Password:
                                </label>
                                <input type="password"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none password"
                                    id="password" minlength="6" required>
                            </div>
                            @error('password')
                                <p class="text-danger bg-white">{{ $message }}</p>
                            @enderror
                            <div class="mb-2">
                                <label for="password_confirmation">
                                    <span class="text-danger">*</span> Confirm Password:
                                </label>
                                <input type="password"
                                    class="form-control border-0 border-bottom rounded-0 shadow-none password_confirmation"
                                    id="password_confirmation" minlength="6" required>
                            </div>
                            @error('password_confirmation')
                                <p class="text-danger bg-white">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-4 mt-3">
                        <a class="text-success text-decoration-none text-black" href="/login"
                            style="font-size: 1.2rem"><i class="fa fa-arrow-left"></i> Back to login</a>
                        <button class="btn btn-primary w-50" type="submit"><i class="fa fa-address-card"></i>
                            Register</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const fname = document.querySelector('#fname');
        const mname = document.querySelector('#mname');
        const lname = document.querySelector('#lname');
        const male = document.querySelector('#male');
        const female = document.querySelector('#female');
        const bdate = document.querySelector('#bdate');
        const pnumber = document.querySelector('#pnumber');
        const province = document.querySelector('#province');
        const municipality = document.querySelector('#municipality');
        const village = document.querySelector('#village');
        const street = document.querySelector('#street');
        const username = document.querySelector('#username');
        const password = document.querySelector('#password');
        const password_confirmation = document.querySelector('#password_confirmation');
        let gender = 0;

        const selectedGender = () => {
            male.addEventListener('change', () => {
                if (male.checked) {
                    gender = 1;
                    female.checked = false;
                } else {
                    gender = 0;
                }
            });

            female.addEventListener('change', () => {
                if (female.checked) {
                    gender = 2;
                    male.checked = false;
                } else {
                    gender = 0;
                }
            });
        }

        const form = () => {
            const formPost = document.querySelector('#formPost');

            formPost.addEventListener('submit', (e) => {
                e.preventDefault();

                if (gender == 0) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Please select gender!'
                    })
                    return;
                } else if (password.value != password_confirmation.value) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Please match your password and confirm password!'
                    })
                    return;
                }

                const path = "/registration/store";
                const formData = new FormData();
                formData.append("fname", fname.value);
                formData.append("mname", mname.value);
                formData.append("lname", lname.value);
                formData.append("gender", gender);
                formData.append("bdate", bdate.value);
                formData.append("pnumber", pnumber.value);
                formData.append("province", province.value);
                formData.append("municipality", municipality.value);
                formData.append("village", village.value);
                formData.append("street", street.value);
                formData.append("username", username.value);
                formData.append("password", password.value);
                formData.append("password_confirmation", password_confirmation.value);

                postData(formData, path);
                clearInputFields();
            });
        }

        const clearInputFields = () => {
            fname.value = "";
            mname.value = "";
            lname.value = "";
            gender = 0;
            male.checked = false;
            female.checked = false;
            bdate.value = "";
            pnumber.value = "";
            province.value = "";
            municipality.value = "";
            village.value = "";
            street.value = "";
            username.value = "";
            password.value = "";
            password_confirmation.value = "";
        }

        init();

        function init() {
            selectedGender();
            form();
        }
    </script>

</x-layout>
