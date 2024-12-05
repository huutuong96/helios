@extends('FrontEnd.index')

@section('css')
    
@endsection

@section('main')

<section class="blog_post">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <div class="entry-detail">
                    <div class="entry-meta-data">

                        <div class="blog-top-desc">
                            <h1>{{$blog->title}}</h1>
                        </div>

                    </div>
                    <div class="entry-photo">
                        <figure><img src="{{ asset("public/public/images/post/".$blog->img) }}"></figure>
                    </div>
                    <div class="content-text clearfix">
                        @php
                            echo $blog->detail;
                        @endphp
                    </div>
                </div>

                <!-- Comment -->
                <div class="single-box">
                    <div class="best-title text-left">
                        <h2>Bình luận</h2>
                    </div> 
                    <div class="comment-list">
                        <ul class="comments-list">
                            @if ($comments->isEmpty())
                                Chưa có bình luận nào cho bài viết này
                            @else 
                               @foreach($comments as $comment)
                                   <li class="comment" style="display: flex; margin: 5px">
                                     <div class="user-img"><img src="{{asset("images/user/".$comment->user_img ??user.jpg)}}" alt="" style="height: 60px; width: 60px;; border-radius: 100%"><br></div>
                                     <div class="comment-content" style="margin: 5px 20px">
                                       <b>{{$comment->user_name}}</b><br>
                                       <span>{{$comment->detail}}</span>
                                     </div>
                                   </li>
                               @endforeach
                            @endif
                         </ul>
                    </div>
                </div>
                <form action="{{route("create_post_comment")}}" method="post" >
                    @csrf 
                    <div class="single-box comment-box">
                        <div class="best-title text-left">
                            <h2>Để lại bình luận của bạn</h2>
                        </div>
                        <div class="coment-form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="fullname">Họ tên:</label>
                                    <input id="fullname" name="fullname" type="text" value="{{Auth::user()->fullname ?? ""}} " class="form-control">
                                    <input type="hidden" name="post_id" value="{{$blog->id}} ">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id ?? ""}}  ">
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Email:</label>
                                    <input id="email" name="email" type="text" class="form-control" value="{{Auth::user()->email ?? ""}} ">
                                </div>
                                <div class="col-sm-12">
                                    <label for="detail">Nội dung:</label>
                                    <textarea name="detail" id="detail" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                            <button class="button" type="submit"><span>Gửi bình luận</span></button>
                        </div>
                    </div>
                </form>
                <!-- ./Comment -->
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    
@endsection