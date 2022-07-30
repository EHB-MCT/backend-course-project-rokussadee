<div >
<form class="bg-gray-100 pb-6"  action="{{route('question.postquestion', ['form'=>$form])}}" method="POST" >

    <!-- card a -->
    @csrf
    @method('POST')

    <div class="absolute left-0 right-0 -top-full mx-auto bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96 transition" id="modalContainer">
        <!-- header -->
        <div class="flex items-center justify-between mt-5">
            <div class="flex items-center">
                <span class="text-lg font-semibold text-neutral-700">Maak een nieuwe vraag aan:</span>
            </div>
        </div>
        <div class="flex justify-between mb-4">
            <div>
                <input class="form-control" name="title" placeholder="Titel">
            </div>
        </div>
        <!-- bedge -->
        <label class="text-lg font-semibold text-neutral-700" for="optionCount">Hoeveel opties wilt u toevoegen?</label>
        <div class="flex items-center justify-between">
            <button class="text-gray-500 px-3 text-sm py-3 bg-gray-800-50-50 rounded-lg font-medium">
                -
            </button>
            <input class="text-blue-500 px-3 text-sm py-3 bg-blue-50 rounded-lg font-black" name="optionCount" value="10">
            <button class="text-gray-500 px-3 text-sm py-3 bg-gray-100-50-50 rounded-lg font-medium">
                +
            </button>
        </div>

        <div id="myModal" class="form-group">
            <label for="categorySelection">Voeg categorieën toe:</label>
            <select id="categorySelection" multiple class="livesearch form-control p-3" name="livesearch[]"></select>
        </div>

{{--        jQuery script for categories autosuggestion.
            Based on following code:
            https://www.tutsmake.com/laravel-8-autocomplete-search-from-database-tutorial/--}}
        <script type="text/javascript">
            $('#categorySelection').select2({
                placeholder: 'Categorie',
                dropdownParent: $('#myModal'),
                ajax: {
                    url: '/ajax-autocomplete-search',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                // console.log(item)
                                return {
                                    text: item.title,
                                    id: item.title
                                }
                            })
                        };
                    },
                    cache: false
                },
                escapeMarkup: function(markup) {
                    return markup;
                },
                minimumInputLength: 1,
                templateResult: formatCategory,
                templateSelection: function (category) {
                    return category.text;
                },
                closeOnSelect: false,
                allowClear: true
            });
            function formatCategory(category) {
                if (category.loading)
                {
                    return category.text;
                }
                let markup = "<option value=" + category.text + " class='select2-result-categoriessitory__title fs-lg fw-500'>" + category.text + "</option>";
                return markup;
            }
        </script>

        <input type="text" hidden name="user_id" value={{$form->id}}>

        <!-- body -->

        <button class="text-green-500 text-sm py-2 px-4 bg-green-50 hover:bg-green-100 hover:text-green-800 rounded font-semibold" type="submit" name="submit" id="ok-btn"> Submit Question </button>

    </div>


</form>
<?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['livesearch'])) {
            foreach ($_POST['livesearch'] as $selected) {
                dd($selected);
            }
        } else {
            dd('please select a value');
        }
    }
    ?>
</div>
