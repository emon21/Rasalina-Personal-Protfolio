@extends('admin.admin_master')
@section('title', 'Edit Partner')
@section('content')
      <div class="page-content">
         <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
               <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                     <h4 class="mb-sm-0">Dashboard</h4>
                     <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                           <li class="breadcrumb-item active">Edit Partner</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end page title -->

            <h1>Edit Partner</h1>
            {{-- <form action="{{ route('admin.partner.update', $partner) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input name="name" class="form-control mb-3" value="{{ old('title', $partner->title) }}" required>

               <div class="mb-3">
                  <label class="form-label">Add more Images</label>
                  <input type="file" name="images[]" id="images" multiple accept="image/*" class="form-control" />
               </div>
               <div id="newPreview" class="mb-3 d-flex flex-wrap gap-2"></div>
               {{-- <h5>Current Images</h5>
               <div class="row g-2">
                  @foreach($partner->images as $image)
                  <div class="col-auto" id="img-{{ $image->id }}">
                     <div class="card" style="width: 140px;">
                        <img src="{{ asset($image->file) }}" class="card-img-top" style="height:100px; object-fit:cover;">
                        <div class="card-body p-2">
                           <button type="button" class="btn btn-sm btn-danger w-100"
                              onclick="deleteImage({{ $image->id }})">Delete</button>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div> --}}

               {{-- <h5>Current Images</h5>
               <div class="row g-2">
                  @foreach($partner->images as $image)
                  <div class="col-auto" id="img-{{ $image->id }}">
                     <div class="card" style="width: 140px;">
                        <img src="{{ asset($image->file) }}" class="card-img-top" style="height:100px; object-fit:cover;">
                        <div class="card-body p-2">
                           <button type="button" class="btn btn-sm btn-danger w-100"
                              onclick="deleteImage({{ $image->id }})">Delete</button>

                           {{-- Optional update/replace input
                           <input type="file" class="form-control mt-2" onchange="updateImage({{ $image->id }}, this)">
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div> 


               <h5>Current Images</h5>
               <div class="row g-2" id="image-container">
                  @foreach($partner->images as $image)
                     <div class="col-auto" id="img-{{ $image->id }}">
                        <div class="card" style="width: 140px;">
                           <img src="{{ asset($image->file) }}" class="card-img-top" style="height:100px; object-fit:cover;">
                           <div class="card-body p-2">
                              <button type="button" class="btn btn-sm btn-danger w-100"
                                 onclick="deleteImage({{ $image->id }})">Delete</button>

                              <input type="file" class="form-control mt-2" onchange="updateImage({{ $image->id }}, this)">
                           </div>
                        </div>
                     </div>
                  @endforeach
               </div>

               <button class="btn btn-primary mt-3">Update</button>
            </form> --}}


            <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')

       <h5>Current Images</h5>
       <div class="row g-2" id="image-container">
           @foreach($partner->images as $image)
               <div class="col-auto" id="img-{{ $image->id }}">
                   <div class="card" style="width: 140px;">
                       <img src="{{ asset($image->file) }}" class="card-img-top" style="height:100px; object-fit:cover;">
                       <div class="card-body p-2">
                           <button type="button" class="btn btn-sm btn-danger w-100"
                               onclick="deleteImage({{ $image->id }})">Delete</button>

                           <input type="file" class="form-control mt-2"
                               name="update_images[{{ $image->id }}]"
                               onchange="updateImage({{ $image->id }}, this)">
                       </div>
                   </div>
               </div>
           @endforeach
       </div>

       <hr>
       <h5>Add New Images</h5>
       <input type="file" name="new_images[]" multiple class="form-control mb-3">

       <!-- Hidden field for deleted images -->
       <input type="hidden" name="deleted_images" id="deleted_images">

       <button type="submit" class="btn btn-primary">Update Partner</button>
   </form>
         </div>
      </div>

      <script>

         // document.getElementById('images').addEventListener('change', function (e) {
         //    const preview = document.getElementById('newPreview');
         //    preview.innerHTML = '';
         //    Array.from(e.target.files).forEach(file => {
         //       const reader = new FileReader();
         //       reader.onload = ev => {
         //          const img = document.createElement('img');
         //    img.src = ev.target.result;
         //    img.style.width = '120px';
         //    img.style.height = '120px';
         //    img.style.objectFit = 'cover';
         //    img.className = 'rounded border';
         //    preview.appendChild(img);
         // };
         // reader.readAsDataURL(file);
         //       });
         //    });

         // function deleteImage(id) {
         //    if (!confirm('Delete this image?')) return;
         //    fetch("{{ url('partner-images') }}/" + id, {
         //       method: 'DELETE',
         //       headers: {
         //          'X-CSRF-TOKEN': '{{ csrf_token() }}',
         //          'Accept': 'application/json'
         //       }
         //    }).then(r => r.json()).then(data => {
         //       if (data.status === 'ok') document.getElementById('img-' + id).remove();
         //    });
         // }

         // or code

         // function deleteImage(id) {
         //    if (confirm('Are you sure you want to delete this image?')) {
         //       fetch(`{{ url('partner/image') }}/${id}`, {
         //          method: 'DELETE',
         //          headers: {
         //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
         //          }
         //       })
         //          .then(res => res.json())
         //          .then(data => {
         //             if (data.success) {
         //                document.getElementById(`img-${id}`).remove();
         //             }
         //          });
         //    }
         // }

         // function updateImage(id, input) {
         //    const formData = new FormData();
         //    formData.append('image', input.files[0]);

         //    fetch(`{{ url('partner/image/update') }}/${id}`, {
         //       method: 'POST',
         //       headers: {
         //          'X-CSRF-TOKEN': '{{ csrf_token() }}'
         //       },
         //       body: formData
         //    })
         //       .then(res => res.json())
         //       .then(data => {
         //          if (data.success) {
         //             alert('Image updated!');
         //             // preview update instantly (optional)
         //             document.querySelector(`#img-${id} img`).src = data.new_path;
         //          }
         //       });
         // }

         // or code working

         // function deleteImage(id) {
         //    if (confirm('Are you sure you want to delete this image?')) {
         //       // শুধু DOM থেকে remove করবে
         //       const imgDiv = document.getElementById('img-' + id);
         //       if (imgDiv) imgDiv.remove();
         //       console.log('Image removed (frontend only)');
         //    }
         // }

         // function updateImage(id, input) {
         //    const file = input.files[0];
         //    if (!file) return;

         //    // file preview দেখানোর জন্য FileReader ব্যবহার করছি
         //    const reader = new FileReader();
         //    reader.onload = function (e) {
         //       const imgTag = document.querySelector(`#img-${id} img`);
         //       if (imgTag) {
         //          imgTag.src = e.target.result; // preview update
         //          console.log('Image updated (frontend only)');
         //       }
         //    };
         //    reader.readAsDataURL(file);
         // }


         let deletedImages = [];

            function deleteImage(id) {
               if (confirm('Are you sure you want to delete this image?')) {
                  // Remove image from UI
                  const imgDiv = document.getElementById('img-' + id);
                  if (imgDiv) imgDiv.remove();

                  // Track deleted IDs
                  deletedImages.push(id);
                  document.getElementById('deleted_images').value = deletedImages.join(',');
               }
            }

            function updateImage(id, input) {
               const file = input.files[0];
               if (!file) return;

               const reader = new FileReader();
               reader.onload = function (e) {
                  const imgTag = document.querySelector(`#img-${id} img`);
                  if (imgTag) {
                     imgTag.src = e.target.result; // Preview update
                  }
               };
               reader.readAsDataURL(file);
            }
      </script>
@endsection