@extends('admin.admin_master')
@section('title', 'Partner Page')
@section('content')

   <div class="container">
      <h1>Create Partner</h1>
      <form action="{{ route('admin.partner.store',$partner) }}" method="POST" enctype="multipart/form-data">
         @csrf
         {{-- <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" class="form-control" value="{{ old('name') }}" required>
         </div> --}}

         <div class="mb-3">
            <label class="form-label">Images (multiple)</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*" class="form-control" />
         </div>

         <div id="preview" class="mb-3 d-flex flex-wrap gap-2"></div>

         <button class="btn btn-primary">Save</button>
      </form>
   </div>


   <script>
      document.getElementById('images').addEventListener('change', function (e) {
         const preview = document.getElementById('preview');
         preview.innerHTML = '';
         Array.from(e.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = ev => {
               const img = document.createElement('img');
               img.src = ev.target.result;
               img.style.width = '120px';
               img.style.height = '120px';
               img.style.objectFit = 'cover';
               img.className = 'rounded border';
               preview.appendChild(img);
            };
            reader.readAsDataURL(file);
         });
      });
   </script>
@endsection