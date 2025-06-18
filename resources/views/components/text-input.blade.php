@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-timber dark:border-myrtle dark:bg-onyx dark:text-timber focus:border-gold dark:focus:border-gold focus:ring-gold dark:focus:ring-gold rounded-md shadow-sm']) }}>