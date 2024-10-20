@extends('layouts.master')


@section('content')
    <!--post-single-->
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                    <div class="post-single-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('uploades/blog/') }}/{{ $blog->thumbnail }}" alt="singel blog image">
                    </div>

                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">
                            <h2> {{ $blog->title }} </h2>
                            <ul class="entry-meta">
                                @if ($blog->one_user->image == 'default.jpg')
                                    <li class="post-author-img"><img
                                            src="{{ Avatar::create($blog->one_user->name)->toBase64() }}" alt="">
                                    </li>
                                @else
                                    <li class="post-author-img"><img
                                            src="{{ asset('uploades/profile/') }}/{{ $blog->one_user->image }}"
                                            alt=""></li>
                                @endif
                                <li class="post-author"> <a href="author.html">{{ $blog->one_user->name }}</a></li>
                                <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span
                                            class="line"></span> {{ $blog->one_user->role }}</a></li>
                                <li class="post-date"> <span class="line"></span>
                                    {{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }} </li>
                            </ul>

                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            <p>{!! $blog->short_description !!}</p>
                            <h4> Full Description </h4>

                            <p>{!! $blog->description !!}</p>

                        </div>

                        <!--post-single-bottom-->
                        <div class="post-single-bottom">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="blog-layout-2.html">brading</a>
                                    </li>
                                    <li>
                                        <a href="blog-layout-2.html">marketing</a>
                                    </li>
                                    <li>
                                        <a href="blog-layout-3.html">tips</a>
                                    </li>
                                    <li>
                                        <a href="blog-layout-4.html">design</a>
                                    </li>
                                    <li>
                                        <a href="blog-layout-5.html">business
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    @if ($blog->one_user->image == 'default.jpg')
                                        <li class="post-author-img"><img
                                                style="width: 80px; height: 80px; border-radius: 50% !important; object-fit: cover"
                                                src="{{ Avatar::create($blog->one_user->name)->toBase64() }}"
                                                alt="">
                                        </li>
                                    @else
                                        <li class="post-author-img"><img
                                                style="width: 80px; height: 80px; border-radius: 50% !important; object-fit: cover"
                                                src="{{ asset('uploades/profile/') }}/{{ $blog->one_user->image }}"
                                                alt=""></li>
                                    @endif
                                </div>
                                <div class="content">
                                    <li class="post-author"> <a href="author.html">{{ $blog->one_user->name }}</a></li>
                                    <p> {{ $blog->one_user->email }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        @auth()
                            <!--post-single-comments-->
                            <div class="post-single-comments">
                                <!--Comments-->
                                <h4>{{ $comments->count() }} Comments</h4>

                                <ul class="comments">
                                    <!--comment1-->
                                    @foreach ($comments as $comment)
                                        <li class="comment-item ">
                                            @if ($comment->one_user->image == 'default.jpg')
                                                <img class="comment_user_image"
                                                    src="{{ Avatar::create($comment->one_user->name)->toBase64() }}"
                                                    alt="">
                                            @else
                                                <img class="comment_user_image"
                                                    src="{{ asset('uploades/profile') }}/{{ $comment->one_user->image }}"
                                                    alt="">
                                            @endif
                                            <div class="content">
                                                <div class="meta">
                                                    <ul class="list-inline">
                                                        <li><a href="#">{{ $comment->name }}</a> </li>
                                                        <li class="slash"></li>
                                                        <li>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p>{{ $comment->comment }}
                                                </p>
                                                <a href="#comment" onclick="myFun({{ $comment->id }})" class="btn-reply"><i
                                                        class="las la-reply"></i> Reply</a>
                                            </div>
                                        </li>
                                        @foreach ($comment->replies as $reply)
                                            <li class="comment-item pl-3">
                                                @if ($reply->one_user->image == 'default.jpg')
                                                    <img class="comment_user_image" src="{{ Avatar::create($reply->one_user->name)->toBase64() }}"
                                                        alt="">
                                                @else
                                                    <img class="comment_user_image" src="{{ asset('uploades/profile') }}/{{ $reply->one_user->image }}"
                                                        alt="">
                                                @endif
                                                <div class="content">
                                                    <div class="meta">
                                                        <ul class="list-inline">
                                                            <li><a href="#">{{ $reply->name }}</a> </li>
                                                            <li class="slash"></li>
                                                            <li>{{ Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p>{{ $reply->comment }}</p>
                                                    <a href="#comment" onclick="myFun({{ $reply->id }})"
                                                        class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                                </div>
                                            </li>

                                            @foreach ($reply->replies as $t)
                                                <li class="comment-item pl-5">
                                                    @if ($t->one_user->image == 'default.jpg')
                                                        <img class="comment_user_image" src="{{ Avatar::create($t->one_user->name)->toBase64() }}"
                                                            alt="">
                                                    @else
                                                        <img class="comment_user_image" src="{{ asset('uploades/profile') }}/{{ $t->one_user->image }}"
                                                            alt="">
                                                    @endif
                                                    <div class="content">
                                                        <div class="meta">
                                                            <ul class="list-inline">
                                                                <li><a href="#">{{ $t->name }}</a> </li>
                                                                <li class="slash"></li>
                                                                <li>{{ Carbon\Carbon::parse($t->created_at)->diffForHumans() }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <p>{{ $t->comment }}
                                                        </p>
                                                    </div>

                                                </li>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </ul>

                                <!--Leave-comments-->
                                <div class="comments-form" id="comment">
                                    <h4>Leave a Reply</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, rem? Doloribus, dolorum asperiores sit ea consequatur suscipit recusandae quos, voluptatem sunt magni minus natus pariatur labore.</p>
                                    <!--form-->
                                    <form class="form " action="{{ route('frontend.blog.comment', $blog->id) }}"
                                        method="POST" id="main_contact_form">
                                        @csrf
                                        <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                            Your message was sent successfully.
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Name*">
                                                    <input type="text" name="parent_id" id="saqlineValo" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="email" id="email" class="form-control"
                                                        placeholder="Email*">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="comment" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" class="btn-custom">
                                                    Send Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/-->
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let saqlineValo = document.querySelector('#saqlineValo');

        function myFun(id) {
            saqlineValo.value = id;
        }
    </script>
@endsection


@section('script')
    @if (session('comment_complete'))
        <script>
            Toastify({
                text: "{{ session('comment_complete') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        </script>
    @endif
@endsection
