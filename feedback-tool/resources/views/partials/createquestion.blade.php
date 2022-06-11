<div>
<form class="bg-gray-100 pb-6"  action={{route('question.postquestion', ['form'=>$form])}} method="POST">

    <!-- card a -->
    @csrf
    @method('POST')

    <div class="bg-white p-8 rounded-lg shadow-lg shadow-neutral-200 w-96">
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
            <label for="categorySelection">Selecteer een categorie:</label>
            <select id="categorySelection" multiple="multiple" class="livesearch form-control p-3" name="livesearch"></select>
        </div>
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
                                return {
                                    text: item.title,
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
                }
            });
            function formatCategory(category) {
                if (category.loading)
                {
                    return category.text;
                }
                console.log('formatRepo category', category);
                let markup = "<div class='select2-result-categoriessitory__title fs-lg fw-500'>" + category.text + "</div>";
                return markup;
            }
        </script>

        <input type="text" hidden name="user_id" value={{$form->id}}>

        <!-- body -->

        <button class="text-green-500 text-sm py-2 px-4 bg-green-50 hover:bg-green-100 hover:text-green-800 rounded font-semibold" type="submit"> Submit Question </button>

    </div>


</form>
</div>
