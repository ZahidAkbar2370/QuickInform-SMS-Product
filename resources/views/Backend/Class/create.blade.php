@extends('Backend.admin_layout')
@section("admincontent")


<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <form class="row" id="class-form">
          <div class="col-md-12">
              <label for="inputName5" class="form-label">Class Name</label>
              <div class="input-group">
                  <input type="text" class="form-control" name="class_names[]" placeholder="Enter Class Name" required="true">
                  <button type="button" class="btn btn-primary add-class"><i class="bi bi-plus-lg
                    "></i></button>
              </div>
          </div>
          <div class="text-center mt-3">
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
      </form>
       

      </div>
    </section>

  </main><!-- End #main -->

<!-- Include jQuery from the Google CDN -->
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
</script>


@endsection