<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Library_Grid_Helper extends ProjectA_Zed_Library_Grid_Helper
{
    /**
     * @static
     * @param ProjectA_Zed_Library_Grid $grid
     * @return ProjectA_Zed_Library_Grid_Renderer_Interface
     */
    public static function getRenderer(ProjectA_Zed_Library_Grid $grid)
    {
        $validRenderers = array(self::RENDERER_HTML, self::RENDERER_CSV);
        $renderer = $grid->getRendererType();
        $rendererUrl = mb_strtolower(ProjectA_Zed_Library_Url::getParam(self::RENDERER));

        if ($grid->allowChangeRenderer() && in_array($rendererUrl, $validRenderers, true)) {
            $renderer = $rendererUrl;
        }

        switch ($renderer) {
            case self::RENDERER_CSV:
                $grid->setRendererType(self::RENDERER_CSV);
                return new ProjectA_Zed_Library_Grid_Renderer_Csv($grid);
            case self::RENDERER_HTML:
            default:
                $grid->setRendererType(self::RENDERER_HTML);
                return new Sao_Zed_Library_Grid_Renderer_Html($grid);
        }
    }
}
