<?php

namespace App;

use InvalidArgumentException;

class ReversePolishNotationCalculator
{
    const OPERATORS = ['*', '/', '+', '-'];

    public function calculate(array $args): int|float
    {
        if (!$args) {
            throw new InvalidArgumentException;
        }

        $operationsVariables = [];
        $operationInProgress = true;

        foreach ($args as $arg) {            
            if (in_array($arg, self::OPERATORS)) {   
                $parameterB = array_pop($operationsVariables);
                $parameterA = array_pop($operationsVariables);

                if (!$parameterA || !$parameterB) {
                    throw new InvalidArgumentException;
                }

                switch ($arg) {
                    case '-':
                        $operationResult = $parameterA - $parameterB;
                        break;
                    case '+':
                        $operationResult = $parameterA + $parameterB;
                        break;
                    case '*':
                        $operationResult = $parameterA * $parameterB;
                        break;
                    case '/':
                        if ($parameterB === 0) {
                            throw new InvalidArgumentException;
                        }
                        $operationResult = $parameterA / $parameterB;
                        break;
                    default:
                        throw new InvalidArgumentException;
                }

                $operationsVariables[] = $operationResult;
                $operationInProgress = false;
            } else {
                $operationsVariables[] = floatval($arg);
                $operationInProgress = true;
            }
        }

        if ($operationInProgress) {
            throw new InvalidArgumentException;
        }

        return $operationsVariables[0];
    }
}