<x-layout>
    <h1 class="title is-1">Statistics</h1>

    <div class="histogram">
        <div class="histogram__y-axis">
            <div class="histogram__y-axis__label">1</div>
            <div class="histogram__y-axis__label">2</div>
            <div class="histogram__y-axis__label">3</div>
            <div class="histogram__y-axis__label">4</div>
            <div class="histogram__y-axis__label">5</div>
            <div class="histogram__y-axis__label">6</div>
        </div>
        <div class="histogram__x-axis">
            <div class="histogram__padding-column"></div>

            @for ($i = 0; $i <= 47; $i++)
                <div class="histogram__column">
                    <div class="histogram__column__label">{{ $i % 6 + 1 }}</div>
                    <div class="histogram__column__pillar">
                        <div class="histogram__column__pillar__fill" style="height: {{ ($i % 6 + 1) * 16.66 }}%;"></div>
                    </div>
                </div>
            @endfor

            <div class="histogram__padding-column"></div>
        </div>
    </div>
</x-layout>
