/**
 * Wordpress dependencies.
 */
import { BlockControls, store as blockEditorStore } from '@wordpress/block-editor';
import { ToolbarButton } from '@wordpress/components';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { list } from '@wordpress/icons';
import { createBlock } from '@wordpress/blocks';
import { useSelect, useDispatch } from "@wordpress/data";

/**
 * Paragraph inspector controls.
 * @param props
 * @returns {JSX.Element}
 */
const ParagraphControls = ( props ) => {

    const { insertBlocks } = useDispatch( blockEditorStore );

    const blockIndex = useSelect( select => {
        const editorStore = select( blockEditorStore );
        return editorStore.getBlockIndex( props.clientId );
    })

    function onInsertBlock() {
        const block = createBlock(
            "core/list",
            {
                ordered: true,
                values: "<li>List item 1</li><li>List item 2</li><li>List item 3</li>"
            }
        )

        insertBlocks( block, blockIndex )
    }

    return (
        <BlockControls group="other">
            <ToolbarButton
                icon={ list }
                label="Prepend a list"
                onClick={ onInsertBlock}
            />
        </BlockControls>
    );
};

/**
 * Register additional block controls to the 'core/paragraph' block.
 */
const controls = createHigherOrderComponent( ( BlockEdit ) => {
    return ( props ) => {
        return (
            <>
                <BlockEdit { ...props } />
                { 'core/paragraph' === props.name && <ParagraphControls { ...props } /> }
            </>
        );
    };
} );

/**
 * Add filter hook
 */
addFilter( 'editor.BlockEdit', 'list-generator/extend-core', controls );
