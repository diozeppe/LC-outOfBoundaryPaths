class Solution {
    private $mGrid = [];
    private $x = 0;
    private $y = 0;
    private $mod = 10**9 + 7;

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $maxMove
     * @param Integer $startRow
     * @param Integer $startColumn
     * @return Integer
     */
    function findPaths($m, $n, $maxMove, $startRow, $startColumn) {
        $this->x = $m;
        $this->y = $n;

        return $this->checkPaths($startRow, $startColumn, $maxMove);
    }

    function checkPaths($sr, $sc, $m) {
        if ($sr < 0 || $sc < 0 || $sr == $this->x || $sc == $this->y) {
            return 1;
        }

        if ($m == 0) {
            return 0;
        }

        if (isset($this->mGrid[$sr][$sc][$m])) {
            return $this->mGrid[$sr][$sc][$m];
        }

        return $this->mGrid[$sr][$sc][$m] =
        (
            $this->checkPaths($sr-1, $sc, $m-1) +
            $this->checkPaths($sr+1, $sc, $m-1) +
            $this->checkPaths($sr, $sc-1, $m-1) +
            $this->checkPaths($sr, $sc+1, $m-1)
        ) % $this->mod;
    }
}
