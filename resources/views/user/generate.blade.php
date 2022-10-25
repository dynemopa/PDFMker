@extends('layouts.header')
@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>

    <body>

        <form id="regForm" method="POST" action="{{ route('make') }}" enctype="multipart/form-data">
            @csrf
            <h1>Generate PDF</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- One "tab" for each step in the form: -->
            <div class="tab">Front page:
                <p><input type="text" placeholder="Title..." oninput="this.className = ''" name="title" value="{{old('title')}}"></p>
                <p><input type="file" oninput="this.className = ''" name="titlepageimage"></p>
            </div>
            <div class="tab">Summary:
                <p>
                    <textarea type="text" onKeyPress rows="4" cols="50" oninput="this.className = ''"
                        id="summarycontent" name="summarycontent">{{{old('summarycontent')}}}</textarea>
                </p>

                <p><input type="number" placeholder="Totel Rain Out Days..." oninput="this.className = ''"
                        name="totelrain" value="{{old('totelrain')}}"></p>
                        <span style="color: red">@error('totelrain'){{$message}}@enderror</span>
                <p><input type="number" placeholder=" Total Mud Days (no work)" oninput="this.className = ''"
                        name="totelmud"value="{{old('totelmud')}}"></p>
            </div>
            <div class="tab">Progress Photos :
                <p><input type="file" oninput="this.className = ''" name="progressphoto" value="{{old('progressphoto')}}"></p>
            </div>
            <div class="tab">Progress Photos-2:
                <p><input type="file" oninput="this.className = ''" name="progressphototwo" value="{{old('progressphototwo')}}"></p>
            </div>
            <div class="tab">Progress Photos-3:
                <p><input type="file" oninput="this.className = ''" name="progressphotothree" value="{{old('progressphotothree')}}"></p>
            </div>
            <div class="tab">Two Week Look Ahead :
                <p>
                    <textarea type="text" placeholder="Two Week Look Ahead Content..."rows="4" cols="50"
                        oninput="this.className = ''" id="twoweekcontent" name="twoweekcontent">{{{old('summarycontent')}}}</textarea>
                </p>
            </div>
            <div class="tab">Safety Topic :
                <p><input type="text" placeholder="Safety Topic..." oninput="this.className = ''" name="safetytopic" value="{{old('safetytopic')}}"></p>
                <p><input type="file" oninput="this.className = ''" name="safetyimage" value="{{old('safetyimage')}}"></p>
            </div>
            <div class="tab">Schedule :<br>
                <p><input type="number" placeholder=" PEMB Roofing" min="0" max="100"
                        oninput="this.className = ''" name="pembroofing" value="{{old('pembroofing')}}"></p>
                <p><input type="number" placeholder=" Frame Exterior Walls.." min="0" max="100"
                        oninput="this.className = ''" name="frameexteriorwalls" value="{{old('frameexteriorwalls')}}"></p>
                <p><input type="number" placeholder=" Sheath Walls & Vapor Barrier" min="0" max="100"
                        oninput="this.className = ''" name="sheathwalls" value="{{old('sheathwalls')}}"></p>
                <p><input type="number" placeholder="Siding Install" min="0" max="100"
                        oninput="this.className = ''" name="sidinginstall" value="{{old('sidinginstall')}}"></p>
                <p><input type="number" placeholder="Windows & Store Fronts" min="0" max="100"
                        oninput="this.className = ''" name="windows" value="{{old('windows')}}"></p>
                <p><input type="number" placeholder="Exterior Door Instal" min="0" max="100"
                        oninput="this.className = ''" name="exteriordoorinstal" value="{{old('exteriordoorinstal')}}"></p>
                <p><input type="number" placeholder="Lighting fixtures & Poles" min="0" max="100"
                        oninput="this.className = ''" name="lightingfixtures" value="{{old('lightingfixtures')}}"></p>
                <p><input type="number" placeholder="Paving " min="0" max="100"
                        oninput="this.className = ''" name="paving" value="{{old('paving')}}"></p>
                <p><input type="number" placeholder="Back Fill behind Curbs " min="0" max="100"
                        oninput="this.className = ''" name="backfillbehindcurbs" value="{{old('backfillbehindcurbs')}}"></p>
                <p><input type="number" placeholder="Pavers" min="0" max="100"
                        oninput="this.className = ''" name="Pavers" value="{{old('Pavers')}}"></p>
            </div>
            <div class="tab">Tasks/Issues/Resolutions:
                <p><span><b>Tasks/Issues</b></span>
                    <textarea type="text" placeholder="Tasks / Issue" rows="4" cols="50" oninput="this.className = ''"
                        id="tasks_issue" name="tasks_issue">{{{old('tasks_issue')}}}"</textarea>
                </p>
                
            </div>
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>

            </div>
        </form>

        <script>
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                //... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }
                //... and run a function that will display the correct step indicator:
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form...
                if (currentTab >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class on the current step:
                x[n].className += " active";
            }
        </script>
    @endsection
