@extends('blog.layout')

@section('content')
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Blog</h4>
              <h2>Our Recent Blog Posts</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="all-blog-posts">
            <div class="row">
              @foreach ($blogs as $blog)
                <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img
                        src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/no-image.png') }}"
                        style="height: 250px; object-fit:contain" alt="">
                    </div>
                    <div class="down-content">
                      <a href="{{ route('blog.show', $blog->id) }}">
                        <h4>{{ $blog->title }}</h4>
                      </a>

                      <p>{{ $blog->description }}</p>

                      <ul class="post-info">
                        <li>{{ $blog->author }}</li>
                        <li>{{ $blog->created_at->diffForHumans() }}</li>
                      </ul>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        {{-- add new post --}}
        <div class="col-lg-12">
          <div class="sidebar-item submit-comment">
            <div class="sidebar-heading">
              <h2>Add new blog</h2>
            </div>
            <div class="content">
              <form id="comment" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="author" type="text" id="author" placeholder="Your name" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <fieldset>
                      <input name="title" type="text" id="title" placeholder="Title">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input type="file" name="image" id="image" accept="image/*" style="padding: 0.5rem 1rem">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="description" rows="6" id="description" placeholder="Description"></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="main-button">Submit</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
