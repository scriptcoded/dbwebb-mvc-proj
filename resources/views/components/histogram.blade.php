<?php

$histogramStyle = '';

if (isset($width)) {
  $histogramStyle .= "width: $width;";
}

if (isset($height)) {
  $histogramStyle .= "height: $height;";
}

if (isset($pillarColor)) {
  $histogramStyle .= "--pillar-color: $pillarColor;";
}

?>

<div
  class="histogram"
  style="{{ $histogramStyle }}"
>
  <div class="histogram__y-axis">
      @for ($i = 1; $i <= $max; $i++)
          <div class="histogram__y-axis__label" title="{{ $i }}">
            <svg viewBox="0 0 20 15">
              <text
                x="50%" y="90%"
                text-anchor="middle"
              >
                {{ $i }}
              </text>
            </svg>
          </div>
      @endfor
  </div>
  <div class="histogram__x-axis">
      <div class="histogram__padding-column"></div>

      @foreach ($values as $label => $value)
          <div class="histogram__column">
              <div class="histogram__column__label"><abbr title="Value: {{ $value }}">{{ $label }}</abbr></div>
              @if ($max > 0)
                <div class="histogram__column__pillar" title="Value: {{ $value }}">
                    <div class="histogram__column__pillar__fill" style="height: {{ round((100 / $max) * $value, 2) }}%;"></div>
                </div>
              @endif
          </div>
      @endforeach

      <div class="histogram__padding-column"></div>
  </div>
</div>
