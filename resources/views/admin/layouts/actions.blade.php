<td>
    <a href="{{ route($edit, $id) }}" class="far fa-edit mr-1" style="font-size: 1.2em;color: orange"></a>
    <form action="{{ route($destroy, $id) }}" method="POST" style="display: inline">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="far fa-trash-alt" style=" color: darkred; border: none; background: 0; cursor: pointer; outline-width: 0;font-size: 1.2em"></button>
    </form>
</td>
