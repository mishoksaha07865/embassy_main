<div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog max-w-[900px]">
      <div class="modal-content max-w-[900px]">
          <div class="modal-header bg-indigo-300">
              <h5 class="modal-title text-black font-semibold" id="exampleModalLabel">Update User</h5>
              <button type="button"
                  class="btn-close text-white flex justify-center items-center  font-bold bg-red-900 p-2"
                  data-bs-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body pt-0">
              {{-- <div class="text-center bg-white py-2 text-xl uppercase rounded-b-xl mb-2">{{$user->licence_name}}-(RL-{{$user->rl_no}})</div> --}}


              <div class="w-full flex flex-wrap py-3 gap-3">
                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white">RL
                          Name</p>
                      <p class="p-3 uppercase pl-2 w-3/4 text-center">{{ $user->licence_name }}</p>
                  </div>
                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p
                          class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">
                          RL Name Arabic</p>
                      <p class="p-3 uppercase w-3/4 flex items-center justify-center text-2xl">
                          {{ $user->arabic_name }}</p>
                  </div>

              </div>

              <div class="w-full flex flex-wrap py-3 gap-3">
                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p
                          class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">
                          RL NO</p>
                      <p class="p-3 uppercase w-3/4 flex items-center justify-center text-2xl">
                          {{ $user->rl_no }}</p>
                  </div>

                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white">
                          Email</p>
                      <p class="p-3 pl-2 w-3/4 text-center overflow-hidden">{{ $user->email }}</p>
                  </div>


              </div>

              <div class="w-full flex flex-wrap py-3 gap-3">
                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p
                          class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg pl-2 text-white">
                          Phone</p>
                      <p class="p-3 uppercase pl-2 w-3/4 flex items-center justify-center text-2xl">
                          {{ $user->phone }}</p>
                  </div>

                  <div class="w-full rounded-lg md:w-[49%] text-xl font-semibold shadow-lg flex">
                      <p
                          class="w-1/4 flex items-center justify-center bg-indigo-400 rounded-l-lg text-white text-center">
                          Office Address</p>
                      <p class="p-3 pl-2 w-3/4 text-center overflow-hidden uppercase">{{ $user->office_address }}
                      </p>
                  </div>


              </div>


              <form action="{{ route('user/update') }}">
                  @csrf
                  <div class="row">
                      <div class="col">
                          <div class="form-outline ">

                              @php
                                  // dd($user->phone);
                                  if ($user->phone) {
                                      echo '
                  
                  ';
                                  } else {
                                      echo '<label class="form-label" for="form6Example4">Agency Owner Phone Number</label><input type="text" id="form6Example4" class="form-control" name="phone"/>';
                                  }
                              @endphp
                              {{-- <label class="form-label" for="form6Example4">Agency Owner Phone Number</label> --}}
                              {{-- @php
                  // dd($user->phone);
                  if($user->phone){
                    echo '
                 
                    ';

                  }
                  else {
                    echo '<input type="text" id="form6Example4" class="form-control" name="phone"/>';           
                  }
                @endphp --}}
                          </div>
                      </div>
                  </div>

                  <div class="mb-3 mt-3">
                      <label for="exampleInputEmail1" class="form-label">Embassy Representative Name</label>
                      {{-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname"> --}}
                      @php
                          // dd($user->phone);
                          if ($user->embassy_man_name) {
                              echo '<input type="text" id="form6Example4" placeholder="' . $user->embassy_man_name . '" class="form-control " value="' . $user->embassy_man_name . '" name="uname"/>';
                          } else {
                              echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uname">';
                          }
                      @endphp

                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Embassy Representative Number(What's
                          App)</label>
                      @php
                          // <input type="text" class="form-control" id="exampleInputPassword1" name="wsphn">
                          if ($user->embassy_man_phone) {
                              echo '<input type="text" id="form6Example4" placeholder="' . $user->embassy_man_phone . '" class="form-control " value="' . $user->embassy_man_phone . '" name="wsphn" />';
                          } else {
                              echo '<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="wsphn">';
                          }
                      @endphp
                  </div>
                  <div class="text-center"> <button type="submit"
                          class="bg-[#289788] text-center hover:bg-[#074f56] px-4 py-1 rounded text-white font-semibold">
                          Save
                      </button></div>

              </form>
          </div>
          {{-- <div class="modal-footer">
      <button type="button" class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white bg-indigo-600 text-white" data-bs-dismiss="modal">Close</button>
     
    </div> --}}
      </div>
  </div>
</div>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content bg-white text-black">
          <div class="modal-header">
              <h5 class="modal-title flex justify-center " id="exampleModalLabel">Add New Passenger</h5>
              <button type="button" class="btn-close btn text-red-700 font-bold" data-bs-dismiss="modal"
                  aria-label="Close">X</button>
          </div>


          <div class="modal-body">
            <h3 class="flex justify-center text-xl font-bold mb-4">Add New Passenger</h3>
              <form class="row g-3" id="addcandidate" action="{{ route('user/index') }}" method="post">
                  @csrf

                  <div class="">
                      <div class="px-10 gap-x-10 grid md:grid-cols-2">
                          <div class="py-1">
                              <div class="font-semibold text-lg">Passenger Name </div>
                              <input type="text" class="form-control uppercase" id="pname"
                                  name="pname" placeholder="" required>
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Passport Number</div>
                              <input type="text" class="form-control uppercase " id="pnumber"
                                  name="pnumber" minlength="0" maxlength="9" required placeholder="">
                          </div>
                          <div class="py-1">
                              <div class="items-center gap-3 flex">
                                  <div class="text-lg font-semibold">Passport Issue Date </div>
                                  <div class="text-md font-semibold">
                                      <input type="radio" id="five" name="passDate" value="five"
                                          checked />
                                      <label for="five" class="mr-4">5 years</label>
                                      <input type="radio" id="ten" name="passDate" value="ten" />
                                      <label for="ten">10 years</label>
                                  </div>
                              </div>
                              <input type="text" class="form-control uppercase " id="pass_issue_date"
                                  placeholder="" name="pass_issue_date">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Passport Expire Date</div>
                              <input type="text" class="form-control uppercase" id="pass_expire_date"
                                  name="pass_expire_date" placeholder="">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Date Of Birth</div>
                              <input type="text" class="form-control uppercase" id="date_of_birth"
                                  name="date_of_birth" placeholder="">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Place Of Birth</div>
                              <input type="text" class="form-control uppercase" id="place_of_birth"
                                  name="place_of_birth" list="districts" placeholder="">
                              <datalist id="districts">
                                  <option value="Bagerhat">
                                  <option value="Barishal">
                                  <option value="Jashore">
                                  <option value="Chattogram">
                                  <option value="Cumilla">
                                  <option value="Bogura">
                                  <option value="Bandarban">
                                  <option value="Barguna">
                                  <option value="Barisal">
                                  <option value="Bhola">
                                  <option value="Bogra">
                                  <option value="Brahmanbaria">
                                  <option value="Chandpur">
                                  <option value="Chapainawabganj">
                                  <option value="Chittagong">
                                  <option value="Chuadanga">
                                  <option value="Comilla">
                                  <option value="Cox's Bazar">
                                  <option value="Dhaka">
                                  <option value="Dinajpur">
                                  <option value="Faridpur">
                                  <option value="Feni">
                                  <option value="Gaibandha">
                                  <option value="Gazipur">
                                  <option value="Gopalganj">
                                  <option value="Habiganj">
                                  <option value="Jamalpur">
                                  <option value="Jessore">
                                  <option value="Jhalokati">
                                  <option value="Jhenaidah">
                                  <option value="Joypurhat">
                                  <option value="Khagrachhari">
                                  <option value="Khulna">
                                  <option value="Kishoreganj">
                                  <option value="Kurigram">
                                  <option value="Kushtia">
                                  <option value="Lakshmipur">
                                  <option value="Lalmonirhat">
                                  <option value="Madaripur">
                                  <option value="Magura">
                                  <option value="Manikganj">
                                  <option value="Meherpur">
                                  <option value="Moulvibazar">
                                  <option value="Munshiganj">
                                  <option value="Mymensingh">
                                  <option value="Naogaon">
                                  <option value="Narail">
                                  <option value="Narayanganj">
                                  <option value="Narsingdi">
                                  <option value="Natore">
                                  <option value="Netrokona">
                                  <option value="Nilphamari">
                                  <option value="Noakhali">
                                  <option value="Pabna">
                                  <option value="Panchagarh">
                                  <option value="Patuakhali">
                                  <option value="Pirojpur">
                                  <option value="Rajbari">
                                  <option value="Rajshahi">
                                  <option value="Rangamati">
                                  <option value="Rangpur">
                                  <option value="Satkhira">
                                  <option value="Shariatpur">
                                  <option value="Sherpur">
                                  <option value="Sirajganj">
                                  <option value="Sunamganj">
                                  <option value="Sylhet">
                                  <option value="Tangail">
                                  <option value="Thakurgaon">
                              </datalist>
                          </div>
                          {{-- <div class="py-1">
                <div class="font-semibold text-lg">Address</div>
                <input type="text" class="form-control uppercase" id="address" name="address" placeholder="">
              </div> --}}
                          <div class="py-1">
                              <div class="font-semibold text-lg">Father's Name</div>
                              <input type="text" class="form-control uppercase" id="father"
                                  name="father" placeholder="">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Mother's Name</div>
                              <input type="text" class="form-control uppercase" id="mother"
                                  name="mother" placeholder="">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Religion</div>
                              <select class="form-control p-2 rounded-lg w-full" size="large" placeholder=""
                                  id="religion" name="religion">
                                  <option selected>Choose...</option>
                                  <option value="MUSLIM">MUSLIM</option>
                                  <option value="NON MUSLIM">NON MUSLIM</option>
                              </select>
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Gender</div>
                              <select class="form-control p-2 rounded-lg w-full" size="large" placeholder=""
                                  name="gender" id="gender">
                                  <option selected>Choose...</option>
                                  <option value="MALE">MALE</option>
                                  <option value="FEMALE">FEMALE</option>
                              </select>
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Marital Status</div>
                              <select id="inputState" class="form-select uppercase" name="married">
                                  <option selected>Choose...</option>
                                  <option value="MARRIED">MARRIED</option>
                                  <option value="UNMARRIED">UNMARRIED</option>
                              </select>
                          </div>
                      </div>
                      <div>
                          <h2 class='my-4 font-bold text-2xl ml-10'>Other Inoformaition</h2>
                      </div>

                      <div class="px-10 gap-x-10 grid md:grid-cols-2">

                          <div class="py-1">
                              <div class="font-semibold text-lg">Medical Center Name</div>
                              <input type="text" class="form-control uppercase" placeholder=""
                                  id="medical_center_name" name="medical_center_name">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Medical Issue Date</div>
                              <input type="text" class="form-control uppercase" placeholder=""
                                  id="medical_issue_date" name="medical_issue_date">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Medical Expiry Date</div>
                              <input type="text" class="form-control uppercase" placeholder=""
                                  id="medical_expire_date" name="medical_expire_date">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Driver Licence Number</div>
                              <input type="text" class="form-control uppercase" id="driving_licence"
                                  placeholder="" name="driving_licence">
                          </div>
                          <div class="py-1">
                              <div class="font-semibold text-lg">Police Clearence No</div>
                              <div class="input-group">
                                  <input type="text" class="form-control uppercase" id="police_licence"
                                      placeholder="" name="police_licence">
                                  <button type="button"
                                      class="rounded-lg bg-blue-500 text-white p-2 text-md font-semibold"
                                      onclick="SearchPC()">Search</button>
                              </div>
                          </div>
                          <div class="text-start">
                          </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit"
                          class="bg-[#190c50] hover:bg-[#074f56] px-3 py-2 rounded text-white font-semibold">
                          Add Passenger
                      </button>
                  </div>
              </form>
          </div>
          {{-- <div class="modal-footer">
              <button type="button" class=" bg-[#074f56] p-3 rounded text-white font-semibold"
                  data-bs-dismiss="modal">Close</button>

          </div> --}}
      </div>
  </div>
</div>
<div class=" ">
  <nav class="w-full h-30 px-2 py-1 bg-[#050A37] text-white flex items-center justify-between">
    <div class="flex items-center md:w-max w-full">
      <div class="flex md:block justify-between items-center mb-2 md:mb-0">
        <a href="{{route('user/index')}}" class=" text-none border-r-2 border-white text-lg font-semibold p-3 flex flex-col"><span class="text-center">حل الملف </span><span>File Solution</span></a>
        {{-- <a class="text-lg" href=""><i class="fa fa-list-alt text-xl pl-6 mr-2" aria-hidden="true"></i>Create Embassy List</a> --}}
      </div>
      <div class="flex items-center text-lg gap-6">
      <a class="text-lg hover:text-blue-200 font-semibold flex" href="{{route('user/passengerList')}}" > <i class="fa fa-list-alt text-xl pl-6 mr-2" aria-hidden="true"></i><p class="md:block hidden">Passenger List</p></a>
      <a href="{{route('user/embassy_list')}}" class="hover:text-gray-300">Embassy List</a>
     <!-- Dropdown Container -->
    <div class="relative inline-block text-left group">
        <!-- Dropdown Trigger -->
        <button class="text-lg hover:text-gray-300 focus:outline-none">
            Manpower Files
        </button>

        <!-- Dropdown Content -->
        <div class="hidden absolute z-10 w-48 bg-white border rounded-md shadow-lg group-hover:block">
            <!-- Embassy Options -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Putup List</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">NoteSheet</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Office Forwarding</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Agency Undertaking</a>
            <!-- Add more embassy options as needed -->

            <!-- Additional styling for the dropdown can be added here -->
        </div>
    </div>
      
        <a href="#" class="hover:text-gray-300">Passenger Report</a>
        <a href="#" class="hover:text-gray-300">Accounts</a>
        <a href="#" class="hover:text-gray-300">Contact Us</a>
      </div>
    </div>

    <div class=" items-center gap-2 flex justify-center space-x-2">
        

         <button  data-bs-toggle="modal" class="text-2xl w-full p-2 rounded-full border-1 border-white w-[40px] h-[40px] flex justify-center items-center" data-bs-target="#user" data-toggle="tooltip" data-placement="bottom" title="Edit Profile">
            <span><i class="fa-regular fa-user " ></i></span>
         </button>

      

         <button data-toggle="tooltip" class="text-2xl w-full p-2 rounded-full border-1 border-white w-[40px] h-[40px] flex justify-center items-center" data-placement="bottom" title="Notification">
           <span class=""><i class="bi bi-bell "></i></span>
         </button>
         <button class="text-xl flex  justify-center items-center p-3 shadow-xl border-1 border-white w-[40px] h-[40px] rounded-full font-bold" data-toggle="tooltip" data-placement="bottom" title="Logout" >
             <a href="{{route('user/logout')}}" class="flex gap-2 font-bold text-xl"><i class="bi text-white font-bold bi-box-arrow-left"></i></a>
             
         </button>
       
    
    </div>
</nav>
  {{-- <section id="topbar" class="d-flex align-items-center ">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> --}}
  
</div>

  
