{{-- create and edit shared js --}}

<script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
        let old_countySelect ={ 
                county: "{{ old('county') ?? $property->county ?? '' }}", 
                sub_county: "{{ old('sub_county') ?? $property->sub_county ?? '' }}" 
        }
</script>
<script src="{{ asset('js/modules/countySelect.js') }}"></script>
<script>
        CKEDITOR.replace( 'descriptionEditor' );
</script>