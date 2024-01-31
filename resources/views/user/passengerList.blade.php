<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passenger List</title>
    @include('layout.head')
    <style>
        #candidatetable_filter {
            margin-bottom: 20px;
        }

        .tooltip {
            position: relative;
            display: inline-block;
            /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: #92560c;
            color: #fff;
            border: 1px solid white;
            text-align: center;
            padding: 3px 3px;
            font-size: 14px;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
            right: 10px;
            top: 40px;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        table.table-bordered.dataTable thead tr:first-child th,
        table.table-bordered.dataTable thead tr:first-child td {
            border-top-width: 1px;
            background-color: lightgray;
        }
    </style>
</head>

<body>
    @include('layout.navbar')
    <div class="container my-5 hello">
        <div class="flex justify-end">
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add Canddidates Passport"
                class="bg-indigo-500 text-white font-semibold text-xl px-14 py-2 rounded-md mb-2" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Add candidate
            </button>
        </div>
        <div class="table-responsive main-datatable ">
            <table class="table stripe no-footer dataTable passenger-table" id="candidatetable">
                <thead class="bg-[#f9f9f9] thed">
                    <tr class="bg-[#f9f9f9]">
                        <th scope="col">Serial <br /> Number</th>
                        <th scope="col">Creation <br /> Date</th>
                        <th scope="col">Name</th>
                        <th scope="col">Passport <br /> Number</th>
                        <th scope="col">DOB</th>
                        <th scope="col" style="">VISA/Sponsor <br /> Number</th>
                        {{-- <th scope="col" style="width: 23%">Profession</th> --}}

                        <th scope="col">Application (MOFA) <br /> Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-400">
                    @foreach ($candidates as $candidate)
                        @php
                            $dob = $candidate->date_of_birth;
                            $birthdate = new DateTime($dob);
                            $currentDate = new DateTime();

                            $ageInterval = $birthdate->diff($currentDate);

                            $years = $ageInterval->y;
                            $months = $ageInterval->m;
                            $days = $ageInterval->d;

                            
                            $age = $ageInterval->y > 0 ? $ageInterval->y . ' year' . ($ageInterval->y > 1 ? 's' : '') : 'Under 1 year';
                            
                        @endphp

                        <tr class="bg-gray-700 td-bg my-auto">
                            <th scope="col" class=""><span>{{ $candidate->id }}</span></th>
                            <td><?php
                            $inputDate = $candidate->created_at;
                            $formattedDate = date('d-m-Y', strtotime($inputDate));
                            echo $formattedDate;
                            ?><br /><?php
                            $inputDate = $candidate->created_at;
                            
                            // Convert the date format
                            $formattedDate = date('H:m', strtotime($inputDate));
                            
                            // Output the formatted date
                            echo $formattedDate;
                            ?></td>
                            <td><a href="{{ route('user/view', ['id' => $candidate->id]) }}"
                                    class="font-semibold hover:font-bold cursor-pointer hover:text-blue-400 ">{{ $candidate->name }}</a>
                            </td>
                            <td>{{ $candidate->passport_number }}</td>
                            <td> <?php
                            $inputDate = $candidate->date_of_birth;
                            
                            // Convert the date format
                            $formattedDate = date('d-m-Y', strtotime($inputDate));
                            
                            // Output the formatted date
                            echo $formattedDate;
                            ?>
                                <br /><span class="font-semibold">Age</span>: @php echo $age; @endphp
                            </td>
                            <td><strong>Visa No:</strong> {{ $candidate->visa_no }} <br />
                                <strong>Sponsor ID:</strong> {{ $candidate->spon_id }}
                            </td>
                            </td>
                            {{-- <td><strong>Eng:</strong> {{$candidate->prof_name_english}} <br/>
                    <strong>Arab:</strong> {{$candidate->prof_name_english}}</td>
                </td> --}}
                            <?php
                            // dd($candidates[0])
                            ?>
                            <td>{{ $candidate->mofa_no }}</td>
                            <td class=" p-2">
                                @if (!$candidate->visa_no)
                                    <div class="md:text-lg text-md cursor-pointer">
                                        <a href="{{ route('user/visaadd', ['id' => $candidate->id]) }}"
                                            {{-- data-bs-toggle="modal" 
                       data-bs-target="#addVisaModal"  --}} class="fw-semibold text-primary">
                                            <i class="bi bi-file-earmark-plus mr-1"></i>Visa
                                        </a>
                                    </div>
                                @endif




                                <div>
                                    <div class="md:text-lg text-md"><a
                                            href="{{ route('user/edit', ['id' => $candidate->id]) }}"
                                            class="fw-semibold text-success"><i
                                                class="bi bi-pencil-square mr-1"></i>Edit</a></div>

                                    <div class="md:text-lg text-md">
                                        <a href="#" onclick="return surity('{{ $candidate->id }}')"
                                            class="fw-semibold text-danger">
                                            <i class="bi bi-trash mr-1"></i>Delete
                                        </a>
                                    </div>

                                    {{-- @if (!$candidate->visa_no)
                    {
                    <div class="md:text-lg text-md fw-semibold text-warning" onclick="showAlert()" ><i class="bi bi-printer-fill mr-1"></i>Print</div>
                    }
                    @else{
                    <div class="md:text-lg text-md"> <a href="{{ route('user/print', ['id' => $candidate->id]) }}" target="_blank" class="fw-semibold text-warning"><i class="bi bi-printer-fill mr-1"></i>Print</a></div>
                    }
                    @endif --}}
                                    @if (!$candidate->visa_no)
                                        <div class="md:text-lg text-md fw-semibold text-warning cursor-pointer"
                                            data-bs-toggle="modal" data-bs-target="#printModal">
                                            <i class="bi bi-printer-fill mr-1"></i>Print
                                        </div>



                                        <!-- Modal -->
                                        <div class="modal fade" id="printModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-indigo-300">
                                                        <h5 class="modal-title text-black font-semibold"
                                                            id="exampleModalLabel">Print Warning</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body font-semibold text-indigo-800">
                                                        Please Enter Candidates Visa Information First and then Try to
                                                        Print
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div
                                                            class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white">
                                                            <a href="{{ route('user/visaadd', ['id' => $candidate->id]) }}"
                                                                {{-- data-bs-toggle="modal" 
                         data-bs-target="#addVisaModal"  --}} class="fw-semibold">
                                                                <i class="bi bi-file-earmark-plus mr-1"></i>Visa
                                                            </a>
                                                        </div>
                                                        <button type="button"
                                                            class="md:text-lg text-md cursor-pointer bg-green-700 p-1 px-2 rounded-lg text-white bg-indigo-600 text-white"
                                                            data-bs-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="md:text-lg text-md">
                                            <a href="{{ route('user/print', ['id' => $candidate->id]) }}"
                                                {{-- target="_blank"  --}} class="fw-semibold text-warning">
                                                <i class="bi bi-printer-fill mr-1"></i>Print
                                            </a>
                                        </div>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    @include('layout.script');
    

</body>

</html>
