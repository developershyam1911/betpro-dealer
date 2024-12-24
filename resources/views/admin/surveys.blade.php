@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Survey Form</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Your Survey Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Preview</th>
                                            <th>Link</th>
                                            <th>Responses</th>
                                            <th>Payment Status</th>
                                            {{-- <th>Edit</th> --}}
                                            {{-- <th>Delete</th> --}}
                                            <th>Cost</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client Name</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Preview</th>
                                            <th>Link</th>
                                            <th>Responses</th>
                                            <th>Payment Status</th>
                                            {{-- <th>Delete</th> --}}
                                            <th>Cost</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($surveys as $survey)
                                            <tr>
                                                <td>{{ $survey->id }}</td>
                                                <td>{{ $survey->client->name }}</td>
                                                <td>{{ $survey->title }}</td>
                                                <td>{{ $survey->status }}</td>
                                                <td>{{ $survey->created_at }}</td>
                                                 <td>
                                                    <a class="text-warning border-0" onclick="previewSurvey({{ $survey->id }})">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                 </td>
                                               
                                                <td>
                                                    <a href="{{ route('survey.fill', $survey->id) }}" target="_blank" class="btn btn-success btn-sm " title=" Public Link">  <i class="fas fa-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('survey.responses', $survey->id) }}" class="btn btn-info btn-sm">View Responses  ({{ $survey->responses()->count() }})</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm {{$survey->payment_status == 'pending' ? 'btn-danger' : 'btn-success'}}">{{$survey->payment_status}}</button>
                                                 </td>
                                                {{-- <td>
                                                    <a href="{{ route('client.survey.edit', $survey->id) }}"
                                                        class="text-secondary"><i class="fas fa-edit"></i></a>
                                                </td> --}}
                                                {{-- <td>
                                                    <a href="{{ route('client.survey.delete', $survey->id) }}"
                                                        onclick="return confirm('Are you sure want to delete?')"
                                                        class="text-danger"><i class="fas fa-trash"></i></a>
                                                </td> --}}
                                                <td><b>&#8377; {{ $survey->amount }}</b></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal for Survey Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="previewModalLabel">Survey Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Dynamic form preview will be injected here -->
          <div id="surveyPreview"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @section('customJs')
  <script>
    function previewSurvey(surveyId) {
        // Make an AJAX request to get the survey data
        const surveyUrl = `{{ route('client.survey.show', ':id') }}`.replace(':id', surveyId);
        fetch(surveyUrl)
        .then(response => response.json())
        .then(data => {
            const formStructure = JSON.parse(data.form_structure);
            const previewContainer = document.getElementById('surveyPreview');
            previewContainer.innerHTML = '';  // Clear any previous content

            // Loop through the form structure to display the form fields
            formStructure.forEach(field => {
                const fieldElement = document.createElement('div');
                fieldElement.classList.add('mb-3');
                
                // Add the label for the field
                const label = document.createElement('label');
                label.innerText = field.question;
                fieldElement.appendChild(label);

                if (field.type === 'text' || field.type === 'email' || field.type === 'phone' || field.type === 'textarea') {
                    const input = document.createElement(field.type === 'textarea' ? 'textarea' : 'input');
                    input.type = field.type;
                    input.placeholder = field.question;
                    input.classList.add('form-control');
                    fieldElement.appendChild(input);
                } else if (field.type === 'radio' || field.type === 'checkbox') {
                    field.options.forEach(option => {
                        const optionContainer = document.createElement('div');
                        optionContainer.classList.add(field.type);

                        const input = document.createElement('input');
                        input.type = field.type;
                        input.name = field.question;  // Ensure same name for radio group
                        input.value = option;
                        input.classList.add('form-check-input');

                        const optionLabel = document.createElement('label');
                        optionLabel.classList.add('form-check-label');
                        optionLabel.innerText = option;

                        optionContainer.appendChild(input);
                        optionContainer.appendChild(optionLabel);

                        fieldElement.appendChild(optionContainer);
                    });
                }

                // Add the field element to the preview container
                previewContainer.appendChild(fieldElement);
            });

            // Show the modal
            var previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            previewModal.show();
        })
        .catch(error => console.error('Error loading survey:', error));
    }
</script>

  @endsection
@endsection
