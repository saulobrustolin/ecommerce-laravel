import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from "@/components/ui/popover"
import { ButtonHTMLAttributes } from "react";

interface OpenPopoverProps extends ButtonHTMLAttributes<HTMLButtonElement> {
    trigger: string;
    children: React.ReactNode | string;
    className?: string;
}

export default function OpenPopover({ trigger, children, className, ...props }: OpenPopoverProps) {
    return (
        <Popover>
            <PopoverTrigger
                className={className ? className : ''}
                {...props}
            >
                {trigger}
            </PopoverTrigger>
            <PopoverContent>
                {children}
            </PopoverContent>
        </Popover>
    )
}