<x-layout>
    <h1 class="title is-1">Statistics</h1>

    <h3 class="title is-3 mt-6">Single dice rolls</h3>
    <h5 class="subtitle">X: result, Y: frequency</h5>

    <x-histogram
        :max="$singleDiceMax"
        :values="$singleDiceData"
    />

    <h3 class="title is-3 mt-6">Dual dice rolls</h3>
    <h5 class="subtitle">X: result, Y: frequency</h5>

    <x-histogram
        :max="$dualDiceMax"
        :values="$dualDiceData"
    />
</x-layout>
