<!-- Rendezéshez tartozó hivatkozások -->
<a href="?{{ Request::get('page') ? 'page='.Request::get('page').'&' : ''}}{{ Request::get('from') ? 'from='.Request::get('from').'&' : ''}}{{ Request::get('to') ? 'to='.Request::get('to').'&' : ''}}ob={{ $field }}&ad={{ Request::get('ad') !== 'asc' ? 'asc' : 'desc' }}">{{$label}}
    @if (Request::get('ob') === $field)
    <i class="bi bi-arrow-{{ Request::get('ad') == 'asc' ? 'down' : 'up' }}-short"></i>
    @endif
</a>