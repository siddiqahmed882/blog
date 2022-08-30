@extends('blog.layout')

@section('content')
  <div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Post Details</h4>
              <h2>Single blog post</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/no-image.png') }}"
                      style="height: 250px; object-fit:contain" alt="">
                  </div>
                  <div class="down-content">
                    <a href="blog-details.html">
                      <h4>{{ $blog->title }}</h4>
                    </a>
                    <ul class="post-info">
                      <li>{{ $blog->author }}</li>
                      <li>{{ $blog->created_at->diffForHumans() }}</li>
                    </ul>
                    <p>{{ $blog->description }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
