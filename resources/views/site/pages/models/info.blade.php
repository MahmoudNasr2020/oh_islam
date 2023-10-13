
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $azkar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="display: contents;">{{ $azkar->category->name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black;font-size: 18px">
                {{ $text != '' ? $text : '' }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: black">اغلاق</button>
            </div>
        </div>
    </div>
</div>
