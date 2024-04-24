<div class="modal fade" id="modalReview-{{$data->id}}" tabindex="-1" aria-labelledby="modalReviewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalReviewLabel">Tambah Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="{{ route('ulasan.store', $data->id) }}" method="POST" novalidate>
                    @csrf
                    <div class="section-title">Tulis Ulasan dan Rating Kamu</div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <div class="selectgroup selectgroup-pills">
                            @for ($i = 1; $i <= 5; $i++) <label class="selectgroup-item">
                                <input type="radio" name="rating" value="{{ $i }}" class="selectgroup-input" required>
                                <span class="selectgroup-button selectgroup-button-icon">
                                    {{ $i }}
                                    <i class="bi bi-star"></i>
                                </span>
                                </label>
                                @endfor
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <label for="ulasan">Ulasan</label>
                        <textarea class="form-control" name="ulasan" id="ulasan" style="height: 150px" placeholder="Tulis ulasan kamu..." required>{{ old('ulasan') }}</textarea>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary btn-lg">Upload</button>
                    </div>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
    </div>
</div>
