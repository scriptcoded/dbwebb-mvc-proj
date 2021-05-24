<x-layout>
    <h1 class="title is-1">Statistics</h1>

    <x-histogram
        :max="$singleDiceMax"
        :values="$singleDiceData"
    />
</x-layout>
