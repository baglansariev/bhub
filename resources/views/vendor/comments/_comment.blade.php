@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

{{--dd($comment->likes())--}}
{{--dd($comment->likes->where('comment_id', $comment->id)->where('liked', true)->count())--}}
{{--dd($comment->current_user())--}}

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media customize-comment-list">
@endif
    <img class="mr-3" src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email ?? $comment->guest_email) }}.jpg?s=64" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
    <div class="media-body">
        <h5 class="mt-0 mb-1 customize-post-commenter-name">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div class="comments-area-cusomize" style="white-space: pre-wrap; color: #000;">
            {!! $markdown->line($comment->comment) !!}
        
            <div class="likes-area" data-id="{{ $comment->id }}">
                <span id="likes-popover-{{ $comment->id }}" class="likes-popover alert alert-danger" role="alert" data-comment-id="{{ $comment->id }}"></span>
                {{--<div>TEST {{$comment->current_user()}}</div>--}}
                {{--<div>{{$comment->likes->where('comment_id', $comment->id)->where('user_id', $comment->current_user()->id)->where('liked', true)->count()}}</div>--}}
                {{--<div>{{$comment->isLikedBy($comment->getUserModel($comment->current_user()->id)) ? "true" : "false"}}</div>--}} 

                @if($comment->current_user())
                <a id="like{{$comment->id}}" href="" class="btn like" data-user-id="{{ $comment->current_user()->id }}"><i id="{{ $comment->id }}" class="{{$comment->isLikedBy($comment->getUserModel($comment->current_user()->id)) ? 'fas' : 'far'}} fa-heart"></i>&nbsp;
                    <div id="like{{$comment->id}}-bs3">{{ $comment->likes()->count() ?: 0 }}</div>
                </a>
                @else
                <a id="like{{$comment->id}}" href="" class="btn like"><i id="{{ $comment->id }}" class="far fa-heart"></i>&nbsp;
                    <div id="like{{$comment->id}}-bs3">{{ $comment->likes()->count() ?: 0 }}</div>
                </a>
                @endif
                <a id="dislike{{$comment->id}}" href="" class="btn dislike hidden"><i id="{{ $comment->id }}" class="far fa-heart"></i>&nbsp;</a>
            </div>
              
        </div>

        <div>
            @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Ответить</button>
            @endcan
            @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Править</button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase">Удалить</a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Редактировать комментарий</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Update your message here:</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                    <!-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Ответить на комментарий</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Введите ваше сообщение здесь:</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                    <!-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Отмена</button>
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Ответить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif

@section('scripts')
    <!-- Likes dislikes for comments -->
    <script type="text/javascript">
        $(document).ready(function() {     


          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


          $('.like').click(function(e){   
            e.preventDefault(); 
            var id = $(this).parent(".likes-area").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);
            var popover = $('#likes-popover-' + id);
            var status = $(this).children();
            var user_id = $(this).data('user-id');

            $.ajax({
               type:'get',
               url:"/ajaxRequest",
               data:{
                  id:id,
                  status:status.attr('class'),
                  user_id:user_id
              },
              success:function(data){
                  if (data.success == null) {
                    $(popover).animate({top: "-60px", opacity: 1}, "fast", "linear").css({"pointer-events": "all"}).text(data.message).fadeIn().delay(1000).animate({top: "-0px", opacity: 0}).css({"pointer-events": "none"});
                } else {
                    $('#like' + id + '-bs3').html(data.success.count);
                    if (data.success.status) {
                      var like = $('#like' + id).find("#"+id);
                      like.removeClass('far fa-heart');
                      like.addClass('fas fa-heart');
                  } else {
                      var dislike = $('#like' + id).find("#"+id);
                      dislike.removeClass('fas fa-heart');
                      dislike.addClass('far fa-heart');
                  }
              }
          }
      });


        });      


          $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
      }); 
    </script>
@endsection