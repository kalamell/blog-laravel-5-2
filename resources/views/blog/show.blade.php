@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">

                    @if( $post->image_url )

                    <div class="post-item-image">
                        <a href="#">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                        </a>
                    </div>

                    @endif

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{ $post->title }}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> {{ $post->author->name }}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{ $post->date }}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>

                            {!! $post->body_html !!} 
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img alt="Author 1" src="/img/author.jpg" class="media-object">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="#">{{ $post->author->name }}</a></h4>
                        <div class="post-author-count">
                          <a href="#">
                              <i class="fa fa-clone"></i>
                              90 posts
                          </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
                      </div>
                    </div>
                </article>

                <!-- comment here -->


            </div>
            <div class="col-md-4">
                <aside class="right-sidebar">
                    <div class="search-widget">
                        <div class="input-group">
                          <input type="text" class="form-control input-lg" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div><!-- /input-group -->
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Categories</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="categories">
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> Web Development</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> Web Design</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> General</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> DIY</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-angle-right"></i> Facebook Development</a>
                                    <span class="badge pull-right">10</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Popular Posts</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="popular-posts">
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="/img/Post_Image_5_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #5</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="/img/Post_Image_4_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #4</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="/img/Post_Image_3_thumb.jpg" />
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        <h6><a href="#">Blog Post #3</a></h6>
                                        <div class="post-meta">
                                            <span>36 minutes ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="widget">
                        <div class="widget-heading">
                            <h4>Tags</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <li><a href="#">PHP</a></li>
                                <li><a href="#">Codeigniter</a></li>
                                <li><a href="#">Yii</a></li>
                                <li><a href="#">Laravel</a></li>
                                <li><a href="#">Ruby on Rails</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Vue Js</a></li>
                                <li><a href="#">React Js</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
