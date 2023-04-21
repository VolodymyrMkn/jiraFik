<x-admin.layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <x-admin.languages :$languages>
                <form action="{{ route('options.update', compact(['option'])) }}"
                      method="POST">
                    @method('put')
                    @csrf
                    <input type="text" name="site_id" value="{{ $option->id }}" hidden>
                    @error("site_id") <span>{{ $message }}</span> @enderror
                    @foreach($languages as $language)
                        <div class="tab-pane fade {{ $loop->index===0 ? 'show active' : '' }}"
                             id="{{ $language->slug }}"
                             role="tabpanel"
                             aria-labelledby="custom-tabs-three-home-tab">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text"
                                          name="content[{{ $language->id }}][content]"
                                          class="form-control"></textarea>
                                {{--                                @error("content") <span>{{ $message }}</span> @enderror--}}
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-app bg-success m-0">
                        <i class="fas fa-plus"></i> Save Language
                    </button>
                </form>
            </x-admin.languages>
        </div>
    </div>
</x-admin.layout>

