<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form method="POST" action="{{route('save_property')}}" class="flex justify-center " x-init="$watch('selectedTypeId', value => selectType(value)),$watch('values', value => setAllowedValues(values))" x-data="{

        selectedTypeId: null,

        selectedType: null,
        properteyName: '',
        types: {{$types}},
        allowedValues: [],
        values:'',
        propertyValue: '',

        selectType(id){
        this.selectedType = this.types.find(type => type['id'] == id);
        this.properteyName = this.selectedType ? this.selectedType['name'] : '';
        },

        setAllowedValues(values){
            this.allowedValues = values.split(',').map(value => value.trim());
        },
    }">
    @csrf
        <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold mb-10">New Property</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Type
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="type_id" x-model="selectedTypeId">
                    <option  selected>Type</option>

                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

                <template x-if="selectedType">
                    <div class="mt-10">
                        <input autocomplete="off"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name" placeholder="Property Name" x-model="properteyName"
                            :value="properteyName">
                    </div>

                </template>


                <template x-if="selectedType?.is_selectable == 1">
                    <div class="mt-10">
                    <label for="allowed-values">Allowed Values</label>

                    <input id="allowed-values" autocomplete="off"
                        class="shadow appearance-none border rounded w-full py-2 px-3
                         text-gray-700 leading-tight"
                         type="text" placeholder="value1, value2, value3,..." name="allowed_values" x-model="values">

                         <label for="value">Property Value</label>

                        <select x-model="propertyValue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="value">
                            <template x-for="value in allowedValues" :key="value">
                                <option x-text="value" :value="value"></option>
                            </template>
                        </select>

                        </div>


                </template>

                <template  x-if="selectedType?.is_selectable == 0">

                <div class="mt-10">
                    <input autocomplete="off"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="test" :type="selectedType?.input_type" :placeholder="properteyName" name="value">
                </div>
            </template>


            <div class="flex items-center justify-between mt-10">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
            </div>
        </div>
    </div>
    </form>
</body>

</html>
