<?php
namespace HasanAhani\FilamentOtpInput\Components;

use _PHPStan_11268e5ee\Nette\PhpGenerator\Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Notifications\Notification;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;

class OtpInput extends Field implements Contracts\CanBeLengthConstrained, Contracts\HasAffixActions
{
    use Concerns\CanBeAutocapitalized;
    use Concerns\CanBeAutocompleted;
    use Concerns\CanBeLengthConstrained;
    use Concerns\CanBeReadOnly;
    use Concerns\HasAffixes;
    use Concerns\HasExtraInputAttributes;
    use HasExtraAlpineAttributes;

    protected string $view = 'filament-otp-input::components.otp-input';

    protected int | \Closure | null $numberInput = 4;

    protected bool | \Closure | null $isRtl = false;

    protected string | \Closure | null $type = 'number';
    protected bool | \Closure | null $clearOnEnter = false;

    protected string | \Closure | null $height = '100%';
    protected string | \Closure | null $width = '100%';

    public function height(string | \Closure $height): static
    {
        $this->height = $height;
        return $this;
    }

    public function width(string | \Closure $width): static
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): string
    {
        return $this->evaluate($this->height);
    }

    public function getWidth(): string
    {
        return $this->evaluate($this->width);
    }


    public function clearOnEnter(bool | \Closure $condition = true): static
    {
        $this->clearOnEnter = $condition;
        return $this;
    }
    
    public function shouldClearOnEnter(): bool
    {
        return $this->evaluate($this->clearOnEnter);
    }
    public function numberInput(int | \Closure $number = 4):static
    {
        $this->numberInput = $number;
        return $this;
    }

    public function getNumberInput():int
    {
        return $this->evaluate($this->numberInput);
    }


    public function password(): static
    {
        $this->type = 'password';

        return $this;
    }

    public function text(): static
    {
        $this->type = 'text';

        return $this;
    }

    public function getType(): string
    {
        return $this->evaluate($this->type);
    }

    public function rtl(bool|\Closure $condition = false): static
    {
        $this->isRtl = $condition;

        return $this;
    }

    public function getInputsContainerDirection(): string
    {
        return $this->evaluate($this->isRtl);
    }
}
