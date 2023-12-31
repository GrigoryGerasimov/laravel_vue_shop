@extends('layouts.main')

@section('content')
    <section class='content'>
        <div class="content-header pl-0">
            <div class="container-fluid pl-0">
                <div class="row mb-2">
                    <div class="col-sm-6" role="button">
                        <i class="fas fa-chevron-left"></i>
                        <a href="{{ route('articles.show', $article) }}" class="text-dark ml-1">Back</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a class="text-dark" href="{{ route('articles.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Update Article</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form action='{{ route('articles.update', $article) }}' method='POST' enctype='multipart/form-data'>
            @csrf
            @method('patch')

            <div class='mt-5'>
                <div class='custom-control custom-checkbox'>
                    <input
                        class='custom-control-input custom-control-input-dark custom-control-input-outline'
                        style='width: 350px'
                        type='checkbox'
                        id='is_published'
                        name='is_published'
                        {{ $article->is_published ? 'checked' : '' }}
                    >
                    <label for='is_published' class='custom-control-label text-sm'>Is Published</label>
                </div>
            </div>

            <div class='my-5'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='title' class='text-sm' style='width: 120px'>Title</label>
                    <input
                        class='form-control @error('title') is-invalid @enderror'
                        style='width: 350px'
                        id='title'
                        name='title'
                        value='{{ old('title') ?? $article->title }}'
                        placeholder='title'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('title')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='description' class='text-sm' style='width: 120px'>Description</label>
                    <input
                        class='form-control @error('description') is-invalid @enderror'
                        style='width: 350px'
                        id='description'
                        name='description'
                        value='{{ old('description') ?? $article->description }}'
                        placeholder='description'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('description')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='ean' class='text-sm' style='width: 120px'>EAN/GTIN</label>
                    <input
                        class='form-control @error('ean') is-invalid @enderror'
                        style='width: 350px'
                        id='ean'
                        name='ean'
                        value='{{ old('ean') ?? $article->ean }}'
                        placeholder='ean'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('ean')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='content' class='text-sm' style='width: 120px'>Content</label>
                    <input
                        class='form-control @error('content') is-invalid @enderror'
                        style='width: 350px'
                        id='content'
                        name='content'
                        value='{{ old('content') ?? $article->content }}'
                        placeholder='content'
                    />
                </div>
                @error('content')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='preview_img' class='text-sm' style='width: 120px'>Preview Image</label>
                    <div class='input-group' style='width: 350px'>
                        <div class='custom-file'>
                            <input
                                type='file'
                                class='custom-file-input @error('preview_img') is-invalid @enderror'
                                id='preview_img'
                                name='preview_img'
                            />
                            <label class='custom-file-label' for='preview_img'>choose file</label>
                        </div>
                        <div class='input-group-append'>
                            <span class='input-group-text'>Upload</span>
                        </div>
                    </div>
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @if($article->preview_img && Storage::disk('public')->exists($article->preview_img))
                    <img
                        src='{{ url('storage/' .  $article->preview_img) }}'
                        alt='{{ $article->title }}'
                        style='width: 350px; margin-left: 120px'
                    />
                @endif
                @error('preview_img')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            @if($article->images->isEmpty())

                @foreach($articleImgTypes as $articleImgType)
                    <div class='my-3'>
                        <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                            <label for='{{ $articleImgType }}' class='text-sm' style='width: 120px'>{{ ucwords(str_replace(['_', 'img'], [' ', 'image'], $articleImgType)) }}</label>
                            <div class='input-group' style='width: 350px'>
                                <div class='custom-file'>
                                    <input
                                        type='file'
                                        class='custom-file-input @error($articleImgType) is-invalid @enderror'
                                        id='{{ $articleImgType }}'
                                        name='{{ $articleImgType }}'
                                    />
                                    <label class='custom-file-label' for='{{ $articleImgType }}'>choose file</label>
                                </div>
                                <div class='input-group-append'>
                                    <span class='input-group-text'>Upload</span>
                                </div>
                            </div>
                            <strong class='ml-2 text-danger'>*</strong>
                        </div>
                        @error($articleImgType)
                        <p class='text-danger mt-3'>{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

            @else

                @foreach($article->images()->orderBy('img_type_id')->get() as $articleImage)
                    <div class='my-3'>
                        <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                            <label for='{{ $articleImage->imageType->title }}' class='text-sm'
                                   style='width: 120px'>{{ ucwords(str_replace(['_', 'img'], [' ', 'image'], $articleImage->imageType->title)) }}</label>
                            <div class='input-group' style='width: 350px'>
                                <div class='custom-file'>
                                    <input
                                        type='file'
                                        class='custom-file-input @error($articleImage->imageType->title) is-invalid @enderror'
                                        id='{{ $articleImage->imageType->title }}'
                                        name='{{ $articleImage->imageType->title }}'
                                    />
                                    <label class='custom-file-label' for='{{ $articleImage->imageType->title }}'>choose
                                        file</label>
                                </div>
                                <div class='input-group-append'>
                                    <span class='input-group-text'>Upload</span>
                                </div>
                            </div>
                            <strong class='ml-2 text-danger'>*</strong>
                        </div>
                        @if($articleImage->img_path && Storage::disk('public')->exists($articleImage->img_path))
                            <img
                                src='{{ url('storage/' .  $articleImage->img_path) }}'
                                alt='{{ $articleImage->img_type }}'
                                style='width: 350px; margin-left: 120px'
                            />
                        @endif
                        @error($articleImage->imageType->title)
                        <p class='text-danger mt-3'>{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach

            @endif

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='previous_price' class='text-sm' style='width: 120px'>Previous Price</label>
                    <input
                        class='form-control @error('previous_price') is-invalid @enderror'
                        style='width: 350px'
                        type='number'
                        id='previous_price'
                        name='previous_price'
                        value='{{ old('previous_price') ?? $article->previous_price }}'
                        placeholder='previous price'
                        min='0'
                        step='0.01'
                    />
                </div>
                @error('previous_price')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>


            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='purchase_price' class='text-sm' style='width: 120px'>Purchase Price</label>
                    <input
                        class='form-control @error('purchase_price') is-invalid @enderror'
                        style='width: 350px'
                        type='number'
                        id='purchase_price'
                        name='purchase_price'
                        value='{{ old('purchase_price') ?? $article->purchase_price }}'
                        placeholder='purchase price'
                        min='0'
                        step='0.01'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('purchase_price')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='recommended_retail_price' class='text-sm' style='width: 120px'>RRP</label>
                    <input
                        class='form-control @error('recommended_retail_price') is-invalid @enderror'
                        style='width: 350px'
                        type='number'
                        id='recommended_retail_price'
                        name='recommended_retail_price'
                        value='{{ old('recommended_retail_price') ?? $article->recommended_retail_price }}'
                        placeholder='recommended retail price'
                        min='0'
                        step='0.01'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('recommended_retail_price')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='total_amount' class='text-sm' style='width: 120px'>Total Amount</label>
                    <input
                        class='form-control @error('total_amount') is-invalid @enderror'
                        style='width: 350px'
                        type='number'
                        id='total_amount'
                        name='total_amount'
                        value='{{ old('total_amount') ?? $article->total_amount }}'
                        placeholder='total amount'
                        min='0'
                    />
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('total_amount')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='category_id' class='text-sm' style='width: 120px'>Category</label>
                    <select
                        class='custom-select @error('category_id') is-invalid @enderror'
                        style='width: 350px'
                        id='category_id'
                        name='category_id'
                    >
                        <option selected disabled>select...</option>
                        @foreach($categoriesList as $category)
                            <option value='{{ $category->id }}'
                                    @if(($category->id == $article->category_id) || (old('category_id') == $category->id)) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('category_id')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='size_scale_id' class='text-sm' style='width: 120px'>Size Scale</label>
                    <select
                        class='custom-select @error('size_scale_id') is-invalid @enderror'
                        style='width: 350px'
                        id='size_scale_id'
                        name='size_scale_id'
                    >
                        <option selected disabled>select...</option>
                        @foreach($sizeScalesList as $sizeScale)
                            <option value='{{ $sizeScale->id }}'
                                    @if(($sizeScale->id == $article->size_scale_id) || (old('size_scale_id') == $sizeScale->id)) selected @endif>{{ $sizeScale->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('size_scale_id')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='group_id' class='text-sm' style='width: 120px'>Group</label>
                    <select
                        class='custom-select @error('group_id') is-invalid @enderror'
                        style='width: 350px'
                        id='group_id'
                        name='group_id'
                    >
                        <option selected disabled>select...</option>
                        @foreach($groupsList as $group)
                            <option value='{{ $group->id }}'
                                    @if(($group->id == $article->group_id) || (old('group_id') == $group->id)) selected @endif>{{ $group->title }}</option>
                        @endforeach
                    </select>
                    <strong class='ml-2 text-danger'>*</strong>
                </div>
                @error('group_id')
                <p class='text-danger mt-3'>{{ $message }}</p>
                @enderror
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='tags' class='text-sm' style='width: 120px'>Tags</label>
                    <select
                        class='tags @error('tags') is-invalid @enderror'
                        style='width: 350px'
                        multiple='multiple'
                        id='tags'
                        name='tags[]'
                        data-placeholder='select...'
                    >
                        @foreach($tagsList as $tag)
                            <option
                                value='{{ $tag->id }}'
                                @if((is_array($article->activeTags->toArray()) && in_array($tag->id, $article->activeTags->pluck('id')->toArray())) || (is_array(old('tags')) && in_array($tag->id, old('tags')))) selected @endif
                            >
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='my-3'>
                <div class='form-group d-flex flex-row flex-wrap align-items-baseline'>
                    <label for='colors' class='text-sm' style='width: 120px'>Colors</label>
                    <select
                        class='colors @error('colors') is-invalid @enderror'
                        style='width: 350px'
                        multiple='multiple'
                        id='colors'
                        name='colors[]'
                        data-placeholder='select...'
                    >
                        @foreach($colorsList as $color)
                            <option
                                value='{{ $color->id }}'
                                @if((is_array($article->activeColors->toArray()) && in_array($color->id, $article->activeColors->pluck('id')->toArray())) || (is_array(old('colors')) && in_array($color->id, old('colors')))) selected @endif
                            >
                                {{ $color->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type='submit' class='btn btn-light mt-5'>Update</button>
        </form>
    </section>
@endsection
