@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <form class="row">
            <div class="col-md-6">
              <label for="inputName5" class="form-label">Test Name</label>
              <div class="input-group">
                  <input type="text" class="form-control" name="test_name" placeholder="Enter Test Name" required="true">
              </div>
          </div>

          <div class="col-md-6">
            <label for="inputName5" class="form-label">Test Date</label>
            <div class="input-group">
                <input type="date" class="form-control" name="test_date" required="true">
            </div>
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Class Name</label>
            <select id="class-select" class="form-select" required>
                <option value="" selected>Choose...</option>
                @if(!empty($classes))
                @foreach ($classes as $class)
              <option value="{{ $class->id }}">{{ $class->class_name }}</option>
              @endforeach
              @endif
            </select>
        </div>

        <div class="col-md-6">
            <label for="inputState" class="form-label">Subject Name</label>
            <select id="subject-select" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>

          <div id="student-info-container" class="col-md-12 mt-5">
            <!-- Student information will be dynamically added here -->
        </div>

          {{-- <div class="col-md-12 mt-5">
            
            @if(!empty($classes))
                @foreach ($classes as $class)
                    
                
                <div class="row mt-2">
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Roll #</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="roll_no[]" required="true">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Student Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="student_name[]" required="true">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Total Marks</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="0" name="total_marks[]" required="true">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Obtained</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="0" name="obtained[]" required="true">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Percentage</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="0" name="percentage[]" required="true">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="inputName5" class="form-label">Note</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="optional_note[]" required="true">
                        </div>
                    </div>
                </div>

                @endforeach
                @endif
          </div> --}}

        {{-- <div class="col-md-6">
            <label for="inputName5" class="form-label">Test Date</label>
            <div class="input-group">
                <input type="date" class="form-control" name="test_date" required="true">
            </div>
        </div>

          <div class="col-md-12">
              <label for="inputName5" class="form-label">Class Name</label>
              <div class="input-group">
                  <input type="text" class="form-control" name="class_names[]" placeholder="Enter Class Name" required="true">
                  <button type="button" class="btn btn-primary add-class"><i class="bi bi-plus-lg
                    "></i></button>
              </div>
          </div> --}}
          <div class="text-center mt-3">
              
              <button type="submit" class="btn btn-primary" onclick="return confirm('Are you Sure to Generate?')">Generate</button>
          </div>
      </form>
       

      </div>
    </section>

  </main><!-- End #main -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        // Add an event listener for the class select element
        $('#class-select').on('change', function () {
            var classId = $(this).val();

            if (classId) {
                // Make an AJAX request to get subjects based on the selected class
                $.ajax({
                    url: '/backend/get-subject-through-class/' + classId,
                    method: 'GET',
                    success: function (data) {
                        var subjectSelect = $('#subject-select');
                        subjectSelect.empty(); // Clear previous options

                        // Add new options based on the response
                        data.forEach(function (subject) {
                            subjectSelect.append('<option value="' + subject.id + '">' + subject.subject_name + '</option>');
                        });
                    }
                });

                $.ajax({
                    url: '/backend/get-student-through-class/' + classId,
                    method: 'GET',
                    success: function (data) {
                        var studentContainer = $('#student-info-container');
                        studentContainer.empty(); // Clear previous student info

                        // Loop through the students and add input fields for each student
                        data.forEach(function (student) {
                            // var studentName = student.users.name ? student.users.name : "-";

                            var studentInfo = `
                                <div class="row mt-2">
                                    <div class="col-md-2">
                                        <label for="inputName5" class="form-label">Roll #</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="roll_no[]" required="true"  readonly="true" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputName5" class="form-label">Student Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="student_name[]" required="true" value="${student.id}" readonly="true" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputName5" class="form-label">Total Marks</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="0" name="total_marks[]" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for "inputName5" class="form-label">Obtained</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="0" name="obtained[]" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputName5" class="form-label">Percentage</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="0" name="percentage[]" required="true"  readonly="true" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="inputName5" class="form-label">Note</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="optional_note[]" required="true">
                                        </div>
                                    </div>
                                </div>
                            `;

                            studentContainer.append(studentInfo);
                        });
                    }
                });
            }
        });
    });
</script>




{{-- <!-- Include jQuery from the Google CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
      // Set the maximum number of dynamic fields
      var maxFields = 5;
      var fieldCount = 1;

      // Add a new input field when the "Add Class" button is clicked
      $(".add-class").click(function () {
          if (fieldCount < maxFields) {
              var inputGroup = '<div class="class-input-group"><label for="inputName5" class="form-label mt-2">Class Name</label><div class="input-group"><input type="text" placeholder="Enter Class Name" class="form-control" name="class_names[]" required="true"><button type="button" class="btn btn-danger remove-class"><i class="bi bi-trash"></i></button></div></div>';
              $("#class-form .col-md-12:last").after(inputGroup);
              fieldCount++;
          } else {
              alert("You've reached the maximum limit of " + maxFields + " fields.");
          }
      });

      // Remove an input field when the "Delete" button is clicked
      $(document).on("click", ".remove-class", function () {
          $(this).closest('.class-input-group').remove();
          fieldCount--;
      });
  });
</script> --}}


@endsection