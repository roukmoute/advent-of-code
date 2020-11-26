<?php

namespace AdventOfCode\Day7;

class Day7
{
    /** @var string */
    private $input;

    public function __construct($input)
    {
        $this->parse($input);
    }

    public function signal($wire)
    {
        return $this->{$wire};
    }

    private function parse($input)
    {
        $retry = false;
        $instructions = explode("\n", $input);
        foreach ($instructions as $instruction) {
            $operation = explode(' -> ', $instruction);
            $signal = $this->applyBitwise($operation[0]);
            if ($signal === false) {
                $retry = true;
                continue;
            }
            $wire = $operation[1];
            $this->{$wire} = (int) $signal;
        }

        if ($retry) {
            $this->parse($input);
        }
    }

    private function applyBitwise($signal)
    {
        if (mb_strpos($signal, 'AND')) {
            $signals = explode(' AND ', $signal);
            $left = $signals[0];
            $right = $signals[1];
            if ((!is_numeric($left) && !isset($this->{$left}))
            || (!is_numeric($right) && !isset($this->{$right}))) {
                return false;
            }
            if (isset($this->{$left})) {
                $left = $this->{$left};
            }
            if (isset($this->{$right})) {
                $right = $this->{$right};
            }
            $signal = (int) $left & (int) $right;
        }
        elseif (mb_strpos($signal, 'OR')) {
            $signals = explode(' OR ', $signal);
            $left = $signals[0];
            $right = $signals[1];
            if ((!is_numeric($left) && !isset($this->{$left}))
                || (!is_numeric($right) && !isset($this->{$right}))) {
                return false;
            }
            if (isset($this->{$left})) {
                $left = $this->{$left};
            }
            if (isset($this->{$right})) {
                $right = $this->{$right};
            }
            $signal = (int) $left | (int) $right;
        }
        elseif (mb_strpos($signal, 'LSHIFT')) {
            $signals = explode(' LSHIFT ', $signal);
            if (!isset($this->{$signals[0]})) {
                return false;
            }
            $signal = (int) $this->{$signals[0]} << (int) $signals[1];
        }
        elseif (mb_strpos($signal, 'RSHIFT')) {
            $signals = explode(' RSHIFT ', $signal);
            if (!isset($this->{$signals[0]})) {
                return false;
            }
            $signal = (int) $this->{$signals[0]} >> (int) $signals[1];
        }
        elseif (mb_strpos($signal, 'NOT') !== false) {
            $signal = mb_substr($signal, 4);
            if (!isset($this->{$signal})) {
                return false;
            }
            $signal = 65535 - (int) $this->{$signal};
        }

        if (!is_numeric($signal) && !isset($this->{$signal})) {
            return false;
        }
        if (isset($this->{$signal})) {
            $signal = $this->{$signal};
        }
        return $signal;
    }
}
