<?php

namespace DCS\Form\PointFormFieldBundle\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use CrEOF\Spatial\PHP\Types\Geometry\Point;

class TextToPointTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Point) {
            throw new UnexpectedTypeException($value, 'CrEOF\Spatial\PHP\Types\Geometry\Point');
        }

        return $value->getLongitude().','.$value->getLatitude();
    }

    public function reverseTransform($value)
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        if (false === strpos($value, ',')) {
            throw new UnexpectedTypeException($value, ',');
        }

        list($longitude, $latitude) = explode(',', $value);

        return new Point($longitude, $latitude);
    }
}