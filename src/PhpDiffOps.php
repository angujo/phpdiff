<?php


namespace Angujo\PhpDiff;


/**
 * Class PhpDiffOps
 *
 * @package Angujo\PhpDiff
 */

/**
 * PhpDiff ops
 *
 * Collection of ops
 */
class PhpDiffOps
{
    public function appendOpcode($opcode, $from, $from_offset, $from_len)
    {
        if ($opcode === 'c') {
            $edits[] = new PhpDiffCopyOp($from_len);
        } else {
            if ($opcode === 'd') {
                $edits[] = new PhpDiffDeleteOp($from_len);
            } else /* if ( $opcode === 'i' ) */ {
                $edits[] = new PhpDiffInsertOp(substr($from, $from_offset, $from_len));
            }
        }
    }

    public $edits = [];
}