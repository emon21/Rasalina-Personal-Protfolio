@extends('admin.admin_master')

@section('title', 'All comments')

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
                        <li class="breadcrumb-item active">All comments</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->

         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div
                     class="bg-transparent border-2 card-header border-bottom border-success d-flex justify-content-between align-items-center">
                     <h5 class="my-0 text-success text-bold"><i class="mdi mdi-bullseye-arrow me-1"></i> All
                        Blog Comment
                     </h5>
                  </div>
               </div>

               <div class="mt-4">
                  @foreach ($blogs as $blog)
                     <div class="mb-3 shadow-sm card">
                        <div class="card-header bg-info">
                           <!-- Blog Title Click -->
                           <h5 class="mb-0">
                              <a href="javascript:void(0)" style="display:inline-block"
                                 class="text-white text-decoration-none blog-title" data-id="{{ $blog->id }}">
                                 {{ $blog->blog_title }} ( {{ $blog->comments->count() }} )
                              </a>
                           </h5>
                        </div>

                        <!-- Comment Section -->
                        <div class="card-body comment-section comment-{{ $blog->id }} d-none">
                           <p class="text-muted">💬 Comments : ( {{ $blog->comments->count() }} )</p>

                           @foreach ($blog->comments as $comment)
                              <div class="gap-4 d-flex">
                                 <div class="gap-2 d-flex comment__thumb">
                                    <img src="{{ asset($comment->user->profileImage) }}" alt="" width="85" height="50">
                                    <div class="grid grid-cols-1">
                                       <h4 class="title">{{ $comment->user->name ?? 'Guest' }}</h4>
                                       <span class="date">
                                          {{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                 </div>
                              </div>
                              <!-- Reply Button -->
                              <button class="py-1 my-2 text-white border-0 reply bg-info"
                                 onclick="toggleReplyForm({{ $comment->id }})">
                                 <x-icon.reply />
                              </button>

                              <a href="{{ route('comment-reply-remove', $comment->id) }}"
                                 class="w-full px-1 py-1 my-2 text-sm text-left text-white bg-danger">
                                 Remove
                              </a>

                              <p class="py-2">{{ Str::limit($comment->comment, 100) }}</p>
                              <!-- Reply form (hidden by default) -->
                              <form id="reply-form-{{ $comment->id }}" action="{{ route('admin.comment.store') }}" method="POST"
                                 class="mt-2 mb-2" style="display:none;">
                                 @csrf
                                 <input type="hidden" name="post_id" value="{{ $blog->id }}">
                                 <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                 <textarea name="comment" class="mb-2 form-control" placeholder="Write a reply..."
                                    required></textarea>
                                 <button class="btn btn-sm btn-success">Reply</button>
                              </form>
                              <!-- Show replies -->
                              @if($comment->replies->count() > 0)
                                 @foreach($comment->replies()->latest()->get() as $reply)
                                    <div style="margin-left: 50px;margin-bottom:10px">
                                       <div class="gap-4 d-flex">
                                          <div class="gap-2 d-flex comment__thumb">
                                             <img class="img-rounded" src="{{ asset($reply->user->profileImage) }}" alt="" width="85" height="50">
                                             <div class="grid grid-cols-1">
                                                <h4 class="title">{{ $reply->user->name ?? 'Guest' }}</h4>
                                                <span class="date">
                                                   {{ $reply->created_at->diffForHumans() }}</span>
                                             </div>
                                          </div>
                                       </div>
                                       <p class="pt-2">{{ Str::limit($reply->comment, 100) }}</p>
                                       <a href="{{ route('comment-reply-remove', $reply->id) }}"
                                          class="px-2 py-1 text-sm text-left text-white px- bg-danger">
                                          <svg class="" aria-hidden="true" xmlns="http:// www.w3.org/2000/svg"
                                             width="24" height="24" fill="none" viewBox="0 0 24 24">
                                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                          </svg>
                                       </a>

                                       {{-- <a href="{{ route('comment-reply-remove', $reply->id) }}"
                                          class="w-full px-1 py-1 my-2 mb-3 text-sm text-left text-white bg-danger">
                                          Remove
                                       </a> --}}
                                    </div>
                                 @endforeach
                              @endif
                              <!-- Show replies End -->
                           @endforeach
                        </div>
                     </div>
                  @endforeach
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- container-fluid -->
   </div>
   <!-- End Page-content -->
@endsection

@push('script')
   <script>

      function toggleReplyForm(id) {
         const form = document.getElementById('reply-form-' + id);
         form.style.display = form.style.display === 'none' ? 'block' : 'none';

      }

      document.querySelectorAll('.blog-title').forEach((title) => {
         title.addEventListener('click', () => {
            const id = title.getAttribute('data-id');
            const commentBox = document.querySelector(`.comment-${id}`);

            if (!commentBox) return;

            // অন্য সব comment section বন্ধ করো
            document.querySelectorAll('.comment-section').forEach((section) => {
               if (section !== commentBox) section.classList.add('d-none');
            });

            // toggle show/hide current one
            commentBox.classList.toggle('d-none');
         });
      });

   </script>
@endpush